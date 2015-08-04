
<div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Index Details</h3>
                    </div>
</div>
<div class="main-content">
    <div class="container-fluid" style="margin:20px;">
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                            
                        <div  style="padding:20px;" align="center">
                           
                                
                            
                                <br>
                   <form action='generatemarks' method='post'>
                    <?php
                            echo $this->Form->input('courses', array(
                                'options' => $options,
                                'empty' => '-- select one --',
                                'class' => 'courses',
                                'id' => 'courses',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                              
                                <input class="control-label" type='submit' name='submit' id="courseID1" value='Download  Pdf'>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    



