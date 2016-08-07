<?php

return [
    'adminEmail' => 'admin@mars.cc',  // 系统邮箱名
    'adminEmailPassword' => '',  // 系统邮箱密码
    'adminSMTPHost' => '',  // 系统邮箱的SMTP的HOST
    'passwordKey' => 'e01eeed093cb22bb',

    // 访客可以访问的action列表
    'GUEST_ACTIONS' => array(
        'login', 'register', 'lostpwd'
    ),
];
