<?php

namespace ZhiCaiWX\models;

use Yii;

/**
 * "zc_wx_response_reply"表的model
 *
 * @property string $id
 * @property string $keyword
 * @property string $type
 * @property string $title
 * @property string $url
 * @property string $description
 * @property string $picture
 * @property string $icon
 * @property string $musicurl
 * @property string $hqmusicurl
 * @property string $thumbmediaid
 * @property string $voice
 * @property string $video
 * @property string $image
 * @property string $mediaid
 * @property integer $priority
 * @property integer $show_times
 * @property string $created_at
 */
class WxResponseReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_response_reply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keyword', 'title'], 'required'],
            [['type'], 'string'],
            [['priority', 'show_times'], 'integer'],
            [['created_at'], 'safe'],
            [['keyword'], 'string', 'max' => 50],
            [['title', 'url', 'mediaid'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 10000],
            [['picture', 'icon', 'musicurl', 'hqmusicurl', 'thumbmediaid', 'voice', 'video', 'image'], 'string', 'max' => 200]
        ];
    }
    /**
    * 设置自动创建和更新时间的操作
    * @inheritdoc
    */
    public function behaviors(){
        return [
            yii\behaviors\TimestampBehavior::className(),
        ];
    }
    /**
     * 设置列表页显示列和搜索列
     * @inheritdoc
     */
    public function getIndexLists()
    {
        return [
            'id',// 'ID',
            'keyword',// '关键词',
            'type',// '回复类型',
            'title',// '标题(图文)',
            'url',// '网址链接(图文)',
            'description',// '内容(图文|文本)',
            'picture',// 'banner图片(图文)',
            'icon',// '小图标(图文)',
            'musicurl',// '音乐(音乐)',
            'hqmusicurl',// '高质量音乐链接，WIFI环境优先使用该链接播放音乐',
            'thumbmediaid',// '缩略图的媒体id，通过上传多媒体文件，得到的id',
            'voice',// '音频(音频)',
            'video',// '视频(视频)',
            'image',// '图片(图片)',
            'mediaid',// '通过上传多媒体文件，得到的id',
            'priority',// '优先级（排序）',
            'show_times',// '展示次数',
            'created_at',// '建立时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => '关键词',
            'type' => '回复类型',
            'title' => '标题(图文)',
            'url' => '网址链接(图文)',
            'description' => '内容(图文|文本)',
            'picture' => 'banner图片(图文)',
            'icon' => '小图标(图文)',
            'musicurl' => '音乐(音乐)',
            'hqmusicurl' => '高质量音乐链接，WIFI环境优先使用该链接播放音乐',
            'thumbmediaid' => '缩略图的媒体id，通过上传多媒体文件，得到的id',
            'voice' => '音频(音频)',
            'video' => '视频(视频)',
            'image' => '图片(图片)',
            'mediaid' => '通过上传多媒体文件，得到的id',
            'priority' => '优先级（排序）',
            'show_times' => '展示次数',
            'created_at' => '建立时间',
        ];
    }

    /**
     * 多选项配置
     * @return array
     */
    public function getOptions()
    {
          return [];
    }

    /**
     * toolbars工具栏按钮设定
     * 字段为枚举类型时存在
     * 默认为复选项的值，
     * jsfunction默认值为changeStatus
     * @return array
     * 返回值举例：
     * [
     *  ['name'=>'忘却',//名称
     *  'jsfunction'=>'ask',//js操作方法，默认为：changeStatus
     *  'field'=>'status_2',//操作字段名
     *  'field_value'=>'3'],//修改后的值
     *  ]
     */
    public function getToolbars()
    {
        $attributeLabels = $this->attributeLabels();
        $options = $this->options;
        return [
            ];
    }

}
