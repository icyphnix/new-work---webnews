<html>
     <head>
          <title>发布</title>
      </head>
     <body>
       <center>
            <h3>发布新闻</h3>
             <form action = "action.php?action=add" method="post">

                <table width="1300" border="1">
                     <tr>
                         <td align="right">标题:</td>
                         <td><input type="text" name="newsTitle"/></td>
                     </tr>
                     <tr>
                         <td align="right">描述:</td>
                         <td><input type="text" name="newsDesc"/></td>
                     </tr>
                     <tr>
                         <td align="right" valign="top">内容:</td>
                         <td><textarea cols="25" rows="5" name="newsContent"></textarea></td>
                     </tr>
                     <tr>
                         <td colspan="2" align="center">
                             <input type="submit" value="添加"/>&nbsp;&nbsp;
                            </td>
                     </tr>
                 </table>
             </form>
         </center>
     </body>
 </html>
