<div class="di"
    style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
    <tbody>
        <tr>
            <td style="width:70%;
                font-weight:800;
                border:#333 1px solid;
                border-radius:3px;"
                class="cent">
                <a href="?do=admin" style="color:#000; text-decoration:none;">
                    後台管理區
                </a>
            </td>
                <td>
                <button onclick="document.cookie='user='; location.replace('index.php')" 
                style="width:99%; margin-right:2px; height:50px;">
                管理登出
                </button>
            </td>
        </tr>
    </tbody>
    </table>
    <div style="width:99%;
                height:87%;
                margin:auto;
                overflow:auto;
                border:#666 1px solid;">
        <p class="t cent botli">動畫圖片管理</p>
        <form method="post" target="back" action="?do=tii">
         <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">動畫圖片管理</td>
                    
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>

                <?php 
                
                $mvims=$mvim->all();
                foreach($mvims as $mvim):
                ?>

                    <tr>
                    <td width="45%">
                            <img src="./upload/<?= $$mvim['img']; ?>" style="width:120px;height:40px">
                        </td>
                        <td width="23%">
                            <input type="text" name="text[]" value="<?= $title['text']; ?>">
                        </td>
                        <td width="7%">
                            <input type="radio" name="sh" value="<?= $$mvim['id']; ?>"  <?= ($$mvim['sh']==1)?'checked':''; ?> >
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" value="<?= $$mvim['id']; ?>">
                        </td>
                        <td>

                            <input type="button" value="更換動畫"  onclick="op('#cover','#cvr','include/update_<?= $do; ?>.php?id=<?= $mvim['id'];?>')">
                        </td>
                        <input type="hidden" name="id[]" value="<?= $mvim['id']; ?>">
                    </tr>
                </tbody>
            </table>
    <table style="margin-top:40px; width:70%;">
    <tbody>
        <tr>
            <td width="200px"><input type="button"onclick="op('#cover','#cvr','include/<?=$do; ?>.php')"
             value="新增網站標題圖片">
            </td>
            <td class="cent">
            <input type="submit" value="修改確定">
            <input type="reset" value="重置">
            </td>
        </tr>
    </tbody>
    </table>

    </form>
    </div>
</div>