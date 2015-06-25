

<!DOCTYPE HTML>
<html lang="en">
<head>
      
        <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
        <title>Upload Your File</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>

<section id="wrapper">  
        
       
            <?php echo $this->Form->create('Excel',array('enctype' => 'multipart/form-data'));?>
        
                <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tr>
                                <th><label for="file">Select file</label> </th>
                        </tr>
                        <tr>
                                <td><input type="file" name="file" id="file" size="30" /></td>
                        </tr>
                        <tr>
                                <td><input type="submit" id="btn" class="fl_l" value="Submit" /></td>
                        </tr>
                </table>
                
        <?php echo $this->Form->end();?>
        
</section>

</body>
</html>