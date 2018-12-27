<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shuffle Quotes API Reference | Getting Started</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css"/>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/w3.css"/>

	<!-- <link rel="stylesheet" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" /> -->
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Shuffle Quotes API Reference</h1>

	<div id="body">
	
	
  <p>Sample Request 'shufflequotes.herokuapp.com/api/quote/get?count=2'</p>
 <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Endpoint</th>
        <th>Method</th>
        <th>Example</th>
        <th>Sample Response</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><i>/api/quote/get</i></td>
        <td class="badge w3-blue">GET</td>
        <td>http://shufflequotes.herokuapp.com/api/quote/get</td>
        <td>
<pre>
[
"quote",
	[
	  {
		"id": "4",
		"content": "Simplicity is prerequisite for reliability",
		"author": "Dijkstra",
		"category": ""
	  }
	]
]
</pre>
        </td>
     
      </tr>
      <tr>
        <td><i>/api/quote/get/?count=2</i></td>
        <td class="badge w3-blue">GET</td>
        <td>http://shufflequotes.herokuapp.com/api/quote/get/?count=2</td>
        <td>
<pre>
[
"quote",
	[
	  {
		"id": "4",
		"content": "Simplicity is prerequisite for reliability",
		"author": "Dijkstra",
		"category": ""
	  },
	  {
		"id": "3",
		"content": "When in doubt, use brute force.",
		"author": "Ken Thompson",
		"category": ""
	  }
	]
]
</pre>
    </td>
       
			</tr>
			<tr>
        <td><i>/api/quote/get?category=Ability</i></td>
        <td class="badge w3-blue">GET</td>
        <td>http://shufflequotes.herokuapp.com/api/quote/get?category=Ability</td>
        <td>
<pre>
[
"quote",
	[
	  {
		"id": "4",
		"content": "Simplicity is prerequisite for reliability",
		"author": "Dijkstra",
		"category": "Ability"
	  }
	]
]
</pre>
        </td>
     
      </tr>
			<tr>
        <td><i>/api/category/get</i></td>
        <td class="badge w3-blue">GET</td>
        <td>http://shufflequotes.herokuapp.com/api/category/get</td>
        <td>
<pre>
[
"categories",
	[
	  {
		"category_id": "1",
		"name": "Game"
	  }
	]
]
</pre>
        </td>
     
      </tr>
      <tr>
        <td><i>/api/quote/post</i></td>
        <td class="badge w3-green">POST</td>
        <td>http://shufflequotes.herokuapp.com/api/quote/post</td>
        <td>
<pre>
{
  "content": "Hardwork Pays",
  "Author": "Samuel Washington",
  "cateogry": "Education"
}
</pre>
        </td>
       
      </tr>
      
    </tbody>
  </table>
  </div>
	
	
	
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'ShuffleQuotes API Version <strong>' . '1.0.0' . '</strong>' : '' ?></p>
</div>

</body>
</html>