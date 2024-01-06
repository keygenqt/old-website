<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * @property string $url
 * @property string $quality
 * @property string $video
 * @property string $video_id
 * @property string $audio
 * @property string $audio_id
 * @property bool $permission
 */
class YouTubeUrl extends Model
{
    const LIMIT_SECOND = 300;

    public $url;
    public $audio_id;
    public $video_id;
    public $quality = [];
    public $video = [];
    public $audio = [];
    public $permission = 0;

    public function rules()
    {
        return [
            [['id', 'url', 'audio', 'audio_id', 'video', 'video_id', 'quality'], 'safe'],
        ];
    }

    public function getYouTubeId()
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $this->url, $match)) {
            return $match[1];
        }
        return "";
    }

    public function checkPermission()
    {
        if (!Yii::$app->user->isGuest) {
            return true;
        }
        $value = Yii::$app->cache->get(Yii::$app->getRequest()->getUserIP());

        if ($value !== false) {
            $time = time();
            $this->permission = ((int)((YouTubeUrl::LIMIT_SECOND - ($time - $value)) / 60)) + 1;
            $this->url = '';
            $this->quality = [];
        }

        return $value === false;
    }

    public function download()
    {
        $id = $this->getYouTubeId();
        if (!empty($id)) {
            $name = uniqid();

            list($key, $type) = explode("-", $this->video_id);
            list($key2, $type2) = explode("-", $this->audio_id);

            $dir = Yii::getAlias('@webroot') . '/download';
            shell_exec("youtube-dl --format $key --output \"$dir/$name-video.%(ext)s\" $id");
            shell_exec("youtube-dl --format $key2 --output \"$dir/$name-audio.%(ext)s\" $id");
            $this->video_id = "/download/$name-video.$type";
            $this->audio_id = "/download/$name-audio.$type2";
            Yii::$app->cache->set(Yii::$app->getRequest()->getUserIP(), time(), YouTubeUrl::LIMIT_SECOND);
        }
    }

    public function getFormats()
    {
        $id = $this->getYouTubeId();
        $this->quality = [];
        $this->video = [];
        $this->audio = [];
        if (!empty($id)) {
            $search = 'format code  extension  resolution note';
            $output = shell_exec("youtube-dl --list-formats $id");
            $index = strpos($output, $search);
            if ($index !== -1) {
                foreach (explode("\n", substr($output, $index + strlen($search))) as $key => $value) {
                    $value = trim($value);
                    if (empty($value)) {
                        continue;
                    }
                    $keys = explode(" ", $value);
                    if (!empty($keys[0]) && !empty($keys[10])) {
                        $key = "$keys[0]-$keys[10]";
                        $this->quality[$key] = str_replace("$keys[0] ", "", $value);
                        if (strpos($value, 'audio only') !== false) {
                            $this->audio[$key] = str_replace("$keys[0] ", "", $value);
                        } else {
                            $this->video[$key] = str_replace("$keys[0] ", "", $value);
                        }
                    }
                }
            }
        }
    }
}
