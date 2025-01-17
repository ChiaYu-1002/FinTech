<?php
 
 //建立資料庫連線
 function connectDB(){
  $servername = "localhost";
  $dbname = "08170241";
  $username = "root";
  $password = ""; //本機端預設密碼是空白
  $password = "08170241";  //雲端資料庫密碼

  try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   //set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conn->exec("set names utf8");
   return $conn;
  } catch(PDOException $e){
   echo "Connection failed: " . $e->getMessage();
  } 
 }

 //關閉資料庫連線
 function closeDB($conn) {
  $conn = null;
 }

 //建立資料庫連線以及存取資料庫資料
 try{
  $conn = connectDB();
  $stmt = $conn->prepare("SELECT course_id, course_name, main_category, sub_category FROM course_info");
  $stmt->execute();

  //set the resulting array to associative
  $data = $stmt->fetchALL(PDO::FETCH_ASSOC);
 } catch(PDOException $e){
  echo "Error: " . $e->getMessage();
 }
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
 <meta charset="UTF-8">
 <title>課程資料表</title>
 <meta name="viewport" content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<div class="header">
		<div class="header-left">
			<img src="images/a.jpg" width="10%">
		</div>
		<div class="header-right">
			<ul>
				<li>
					<a href="https://elearning.taipei/mpage/home/sitemap">
						網頁導覽
					</a>
				</li>
				<li>
					<a href="#">會員登入</a>
				</li>
				<li>
					<a href="https://www.facebook.com/elearning.taipei/"><img src="images/d.jpg"></a>
				</li>
			</ul>
		</div>
		<div class="header-middle">
			<ul>
				<li>
					<a href="#">選課中心</a>
				</li>
				<li>
					<a href="https://elearning.taipei/mpage/home/view_page/372">新手上路</a>
				</li>
				<li>
					<a href="https://elearning.taipei/mpage/home/view_news_more">最新消息</a>
				</li>
				<li>
					<a href="#">合作推廣</a>
				</li>
				<li>
					<a href="https://epaper.gov.taipei/Epaper_paperList.aspx?n=0FE5CCC71725D055&siteSN=E6BE3790C28B3B1D&categorySN=6A6B57F5FE966020">鮮活電子報</a>
				</li>
				<li>
					<a href="https://elearning.taipei/mpage/home/feedback/11">客服中心</a>
				</li>
			</ul>
		</div>
		<div class="header-bottom">
			<marquee>
				<div class="a">
					【新課搶鮮大FUN送 市府同仁悅讀趣】開跑囉！  (嚐鮮即可抽900元禮券或限量好禮)  【e大好課月悅讀】6月-性別平等真享愛  開跑囉！  (可抽500元禮券)  【失智症防治照護課程專區】   臺北e大自109/02/01起，每日12：00至13：30停止提供電話客服服務。   【HOT】人權教育最前線！   [必閱]107年11月30日起改由臺北卡提供帳密驗證服務   臺北卡登入或註冊相關問題，請洽1999分機8585
				</div>
			</marquee>
		</div>
	</div>
	<div class="content">
		<h2>分類列表</h2>
		<div class="table">
   			<table border="1" >
    		<table border=1 cellpadding=25 cellspacing=25 bordercolor=#E7E6E6>
 　   			<tr>
 　   				<td width="16.5%">主分類</td>
 　   				<td>
     					<a href="#">公務類</a>
     					<a href="#">管理類</a>
     					<a href="#">人文類</a>
     					<a href="#">資訊類</a>
     					<a href="#">語言類</a>
     					<a href="#">職訓類</a>
    				</td>
 　   			</tr>
 　   			<tr>
 　   				<td>次分類</td>
 　   			</tr>
    			<tr>
 　   				<td>子分類</td>
 　   			</tr>
    			<tr>
 　   				<td>臺北施政廣播站</td>
 　   				<td><a href="#">臺北施政廣播站</a></td>
 　   			</tr>
 　   			<tr>
 　   				<td>退休增值充電站</td>
 　   				<td>
     					<a href="#">資訊新知</a>
     					<a href="#">外語進修</a>
     					<a href="#">技術加值</a>
     					<a href="#">創業圓夢</a>
     					<a href="#">知識傳播</a>
     					<a href="#">田園經濟</a>
     					<a href="#"> 財富管理</a>
     					<a href="#">職場法規</a>
     					<a href="#">職場軟實力</a>
    				</td>
 　   			</tr>
    			<tr>
 　   				<td>公務人員10小時課程</td>
 　   				<td>
     					<a href="#">精選套裝課程</a>
     					<a href="#">熱門系列課程</a>
    				</td>
 　   			</tr>
    			<tr>
 　   				<td>主題系列課程</td>
 　   				<td>
     					<a href="#">性別主流化</a>
     					<a href="#"> CEDAW</a>
     					<a href="#">環境教育</a>
     					<a href="#">行政中立</a>
     					<a href="#">資訊安全</a>
     					<a href="#">家庭教育</a>
     					<a href="#">原住民</a>
     					<a href="#">新移民</a>
     					<a href="#">田園城市</a>
     					<a href="#">志工</a>
    				</td>
 　   			</tr>
    		</table>
   		</table>
  	</div>
	</div>
 <table>
  <tr>
   <th>Course ID</th>
   <th>Course Name</th>
   <th>Course Category</th>
   <th>Sub_Category</th>
  </tr>
  <?php
   foreach ($data as $row){
    echo "<tr>";
    foreach ($row as $key => $value) {
     echo "<td>" . $value . "</td>";
   }
   echo "</tr>";
  }
  ?>
 </table>
 <div class="footer">
  	<div class="aa">
   		<div class="bb">
    		<strong><p>會員人數</p>
    		<p>942263 人</p></strong>
   		</div>
   		<div class="bb">
    		<strong><p>課程總數</p>
   			<p>1744 門課</p></strong>
   		</div>
   		<div class="bb">
    		<strong><p>線上人數</p>
    		<p>4058 人</p></strong>
   		</div>
   		<div class="bb">
    		<strong><p>累計瀏覽人次</p>
    		<p>491269078 人</p></strong>
   		</div>
   		<div class="bb">
   			<strong><p>報名課程總人次</p>
    		<p>1661540人</p></strong>
   		</div>
  	</div>

  	<div class="cc">
   		<a>著作權聲明</a>
   		<a> 隱私權宣告</a>
   		<a> 資訊安全政策</a>
   		<a> 政府網站資料開放宣告</a>
   		<a> 關於我們</a>
  	</div>
  	<div class="dd">
   		<strong><h6>客服相關問題（課程閱讀及時數認證等）</h6></strong>
   		<h6>02-29320212轉分機341 週一至週五 8:30至17:30M</h6>
   		<h6>中午時間請利用語音留言或客服信箱 pstcservice@mail.taipei.gov.tw</h6>
  	</div>
  	<div class="dd">
   		<strong><h6>會員登入問題請洽臺北卡服務中心</h6></strong>
   		<h6>02-27208889轉分機8585 週一至週五 8:30至17:30</h6>
  	</div>
  	<div class="dd">
   		<strong><h6>地址：11693臺北市文山區萬美街2段21巷20號</h6>
  	</div>
</body>

</html>
<?php
 closeDB($conn);
?>