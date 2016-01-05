
// 操作日志
CREATE TABLE `mars_operation_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `targetid` bigint(20) NOT NULL COMMENT '所属操作对象id',
  `content` varchar(400) NOT NULL COMMENT '操作记录',
  `creatorid` bigint(20) NOT NULL COMMENT '创建人id',
  `created` datetime NOT NULL COMMENT '创建时间',
  `target_type` int(11) NOT NULL COMMENT '所属对象类型',
  `remark` varchar(400) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8

// 用户表
CREATE TABLE `mars_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(64) NOT NULL COMMENT '用户名',
  `email` varchar(100) NOT NULL COMMENT '注册邮箱',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态，0:未激活，1:激活',
  `created` datetime NOT NULL COMMENT '创建时间',
  `authKey` varchar(62) NOT NULL COMMENT '验证key',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8


// 用户验证表
CREATE TABLE `mars_user_validate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `email` varchar(64) NOT NULL COMMENT '接受的邮箱',
  `created` datetime NOT NULL COMMENT '创建时间',
  `validated` date DEFAULT NULL COMMENT '验证时间',
  `token` varchar(64) NOT NULL COMMENT '验证的token值',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态,0未验证，1已验证',
  `userid` int(11) unsigned NOT NULL COMMENT '验证的用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8

// 本地登录验证表
CREATE TABLE `mars_localauth` (
  `id` int(11) unsigned NOT NULL COMMENT 'id',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `username` varchar(32) NOT NULL COMMENT '登录名',
  `password` varchar(32) NOT NULL COMMENT '登录密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

