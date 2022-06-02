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

<h2>Breadcrumb Pagination</h2>
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Pictures</a></li>
  <li><a href="#">Summer 15</a></li>
  <li>Italy</li>
</ul>

<h1> HI there this is CSV File  Page  </h1>
</body>
</html>