<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>React Test Page </title>
    <script type="text/javascript" src="vendor/react.js"></script>
    <script type="text/javascript" src="vendor/showdown.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
</head>

<body>
<div id="content">${content}</div>
<script type="text/javascript" src="commentBox.js"></script>
<script type="text/javascript">
    $(function () {
        renderClient(${data});
    });
</script>

<h1> HI there this is test  </h1>
</body>
</html>