
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <style>
            #book{
                  width: 16%;
                  position:relative;
            }
            ul{
              margin: 0px;
              padding: 0px;
              border: 0px;
              list-style: none;
              outline:none;
              resize:none;
            }
           .title2{
                  /* float: left; */
                  /* position:fixed; */
                  background-color:#EBEBEB;
                  width: 16%;
                  height: 600px;
                  margin: 0px;
                  padding: 0px;
                  border: 0px;
                  list-style: none;
                  outline:none;
                  resize:none;
                  float: left;
           }
           .title2 li{
                  height: 60px;
           }
           .title2 li:hover{
                  background-color: #BFEFFF;
                  color: white;
           }
           .title1{
                  /* color: #66ccff; */
                  background-color: #EBEBEB;
                  width: 100%;

           }
            .title1 li{
                  float:left;
                  background-color: #66ccff;
                  width:21%;
                  height: 75px;
           }
           .title1 li:hover{
                  background-color: white;
                  color: #66ccff;

           }
           .content{
                   float: left;
           }
           .none{
                   display: none;
           }
           .show{
                   display: block;
           }
           #users:hover #userslogin{
                   display: block;
           }
           #userslogin{
                   display: none;
                   index:2;
                   position: absolute;
                   float: right;
                   background-color: white;
                   height: 200px;
                   width: 300px;
                   border-width: thick;
                   outline-style: solid;
                   margin-top: 55px;
           }
     </style>
     <script></script>
</head>
<body>
      <ul class="title1">
         <li id="book">3班新闻</li>
         <li>主页</li>
         <li>敬请期待</li>
         <li><a href="pushnews.php">发布新闻</a></li>
         <li id="users">用户
           <ul id="userslogin">
                 <form action="anothercheck.php" method="post" >
                      <div>
                            <div>username</div>
                            <input type="text" name="userName"></input>
                      </div>
                      <div>
                            <div>password</div>
                            <input type="text" name="userPassword"></input>
                      </div>
                      <input type="submit"name="login"></input>
                      <hr></hr>
                      <div>
                           <button><a href="register.php">register</a></button>
                           <span>Any problems?</span>
                      </div>
                  </form>
            </ul>
        </li>
     </ul>
     <ul class="title2">
         <li id="guide1" onclick="changeTab(this.id)" class="selected">公告</li>
         <li id="guide2" onclick="changeTab(this.id)">作业</li>
         <li id="guide3" onclick="changeTab(this.id)">娱乐</li>
         <li id="guide4" onclick="changeTab(this.id)">海豹专场</li>
     </ul>
         <div class="content">
              <div id="text1" class="none">1</div>
              <div id="text2" class="none">2</div>
              <div id="text3" class="none">3</div>
              <div id="text4" class="show">4
                 <center>
                     <table width="800" border="1">
                       <tr>
                           <th>新闻id</th>
                           <th>新闻标题</th>
                           <th>描述</th>
                           <th>发布时间</th>
                           <th>新闻内容</th>
                       </tr>
                            <?php
                               require("dbh.php");
                               $conn=mysqli_connect('localhost','root','','webnews');
                               mysqli_select_db($conn,'webnews');
                               $sql = "select * from news ";
                               $result = mysqli_query($conn,$sql);
                               while($row = mysqli_fetch_assoc($result))
                               {
                                   echo "<tr>";
                                   echo "<td>{$row['newsID']}</td>";
                                   echo "<td>{$row['newsTitle']}</td>";
                                   echo "<td>{$row['newsDesc']}</td>";
                                   echo "<td>".date("Y-m-d",$row['newsDate'])."</td>";
                                   echo "<td>{$row['newsContent']}</td>";
                                   echo "</tr>";
                               }
                               mysqli_free_result($result);
                               mysqli_close($conn);
                            ?>
                     </table>
                  </center>

              </div>
         </div>
     </div>
     <script>
        var tabs=[
          {
            tabId:'guide1',
            contentId:'text1'
          },
          {
            tabId:'guide2',
            contentId:'text2'
          },
          {
            tabId:'guide3',
            contentId:'text3'
          },
          {
            tabId:'guide4',
            contentId:'text4'
          }
        ]
        function changeTab(id){
          for(var i of tabs){
            if(i.tabId===id){
              document.getElementById(i.tabId).className='selected'
              document.getElementById(i.contentId).className='show'
            }else {
              document.getElementById(i.tabId).className=''
              document.getElementById(i.contentId).className='none'
            }
              }
       }
     </script>
</body>
</html>
