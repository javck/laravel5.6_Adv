<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
 */

    'accepted' => ':attribute是被接受的',
    'active_url' => ':attribute必须是一个合法的 URL',
    'after' => ':attribute是 :date 之后的一个日期',
    'alpha' => 'attribute必须全部由字母字符构成。',
    'alpha_dash' => ':attribute必须全部由字母、数字、中划线或下划线字符构成',
    'alpha_num' => ':attribute必须全部由字母和数字构成',
    'array' => ':attribute必须是个数组',
    'before' => ':attribute 必须是 :date 之前的一个日期',
    'between' => [
        'numeric' => ':attribute 必须在 :min 到 :max之间',
        'file' => ':attribute 必须在 :min 到 :max KB之间',
        'string' => ':attribute 必须在 :min 到 :max 个字符之间',
        'array' => ':attribute 必须在 :min 到 :max 项之间',
    ],
    'boolean' => ':attribute 字符必须是 true 或 false',
    'confirmed' => ':attribute 二次输入不相同',
    'date' => ':attribute必须是一个合法的日期',
    'date_format' => ':attribute 与给定的格式 :format 不符合',
    'different' => ':attribute 必须不同于:other',
    'digits' => ':attribute必须是 :digits 位',
    'digits_between' => ':attribute 必须在 :min and :max 位之间',
    'dimensions' => ':attribute的图片比例无效',
    'distinct' => 'The :attribute栏位的值重複.',
    'email' => ':attribute必须是一个合法的电子邮箱地址。',
    'exists' => '选取的 :attribute 是无效的.',
    'file' => ':attribute 必须是一个档案',
    'filled' => ':attribute 属性是必须的.',
    'image' => ':attribute 必须是一个图片 (jpeg, png, bmp 或者 gif)',
    'in' => '选定的 :attribute 是无效的',
    'in_array' => ':attribute 栏位不存在于 :other裡头',
    'integer' => ':attribute 必须是个整数',
    'ip' => ':attribute 必须是一个合法的 IP 地址。',
    'json' => ':attribute 必须是合法的JSON字串',
    'max' => [
        'numeric' => ':attribute 的最大长度为:max位',
        'file' => ':attribute 最大为:max KB',
        'string' => ':attribute 的最大长度为:max字元',
        'array' => ':attribute 的最大个数为:max个',
    ],
    'mimes' => ':attribute 的文件类型必须是:values',
    'min' => [
        'numeric' => ':attribute的最小长度为:min位',
        'file' => ':attribute 大小至少为:min KB',
        'string' => ':attribute的最小长度为:min字元',
        'array' => ':attribute 至少有 :min 项',
    ],
    'not_in' => '选取的 :attribute 是无效的',
    'numeric' => ':attribute 必须是数字',
    'present' => ':attribute 栏位必须是存在的',
    'regex' => ':attribute 格式无效',
    'required' => ':attribute 栏位是必须的',
    'required_if' => ':attribute 栏位是必须的当 :other 栏位是 :value.',
    'required_unless' => ':attribute 栏位是必须的除非 :other 为这些 :values.',
    'required_with' => ':attribute 栏位是必须的当 :values 是存在的',
    'required_with_all' => ':attribute 栏位是必须的当 :values 都是存在的',
    'required_without' => ':attribute 栏位是必须的当 :values 是不存在的',
    'required_without_all' => ':attribute 栏位是必须的当 :values 没有半个存在',
    'same' => ':attribute和:other必须相符',
    'size' => [
        'numeric' => ':attribute 必须是 :size 位',
        'file' => ':attribute 必须是 :size KB',
        'string' => ':attribute 必须是 :size 个字符',
        'array' => ':attribute 必须包括 :size 项',
    ],
    'string' => ':attribute 必须是字串',
    'timezone' => ':attribute 必须是个有效的时区',
    'unique' => ':attribute 已经存在',
    'url' => ':attribute 格式不正确',
    'CaptchaCodeError' => 'CaptchaCode输入错误!',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'g-recaptcha-response' => [
            'required' => '请确认您不是机器人.',
            'captcha' => '验证错误! 请刷新表单后重新上传.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes' => [
        'chkPwd' => '确认密码',
        'newPwd' => '密码',
        'email' => '电子邮箱',
        'username' => '帐号',
        'password' => '密码',
        'serial' => '商品序号',
        'lang' => '语言',
        'name' => '名称',
        'price' => '价格',
        'cabinet_no' => '柜号',
        'link' => '连结',
        'image' => '图片',
        'code' => '条码',
        'en_name' => '英文名字',
        'stock' => '数量',
        'cgy_id' => '商品类别',
        'company_id' => '公司行号',
        'sort' => '排序',
        'qty' => '购买数量',
        'address' => '地址',
        'manager' => '管理者姓名',
        'contact' => '联络电话',
        'guardLtd' => '社区保全公司',
        'pic' => '图片',
        'title' => '标题',
        'url' => '网址',
        'owner_name' => '收件人',
        'content' => '内容',
        'fee' => '费用',
        'contacter' => '联络人',
        'mobile' => '手机号码',
        'type' => '类型',
        'tags_list' => '标籤',
        'mode' => '模式',
        'mediums' => '文章媒体',
        'receiverAddress' => '收件人地址',
        'receiverMobile' => '收件人手机',
        'receiverEmail' => '收件人Email',
        'receiver' => '收件人',
    ],

];
