<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{=$response.meta.title|default:'maigoxin.me'=}</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />

{=AddCss href='third/bootstrap.min.css'=}
{=AddCss href='site/web.css'=}

<script src='{=$smarty.const.JS_ROOT=}/third/require-2.1.16.js'></script>
<script>
(function(){
  requirejs.config({
      paths: {
        jquery: '{=$smarty.const.JS_ROOT=}third/jquery.min',
        bootstrap: '{=$smarty.const.JS_ROOT=}third/bootstrap.min',
        common: '{=$smarty.const.JS_ROOT=}web/common',
      }
    });
 })();
</script>
</head>
<body>
