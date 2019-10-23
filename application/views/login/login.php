<?php ?>
<!--/ Form Search Star /-->

<div class="row" style="margin-top: 100px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">Login</h3>
            </div>
            <div class="box form">
                <form class="form-a" method="post" id="submit">
                    <div class="row">
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Email</label>
                                <input type="text" required id="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Email">
                            
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="city">Password</label>
                                 <input type="password" required id="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Password">
                            
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-b">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>


</div>
<!--/ Form Search End /-->
<script>
    

    $('#submit').submit(function (e) {
        
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Welcome/logincheck',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            error: function (request, error) {
                console.log(request);
                alert(" Invalid Email or Password" );
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
               window.location.href="<?php echo base_url();?>index.php/welcome";
                    
            }
        });
    });
    
</script>