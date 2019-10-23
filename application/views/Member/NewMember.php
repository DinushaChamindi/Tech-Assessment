<?php ?>
<?php ?>
<!--/ Form Search Star /-->

<div class="row" style="margin-top: 100px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">New Member / User </h3>
            </div>
            <div class="box form">
                <form class="form-a" method="post" id="submit">
                    <div class="row">

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Member/User Name</label>
                                <input type="text" id="name" required  name="name" class="form-control form-control-lg form-control-a" placeholder="Name">

                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="city">Email</label>
                                <input type="email" required id="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Email">

                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="city">Address</label>
                                <input type="text" required id="address" name="address" class="form-control form-control-lg form-control-a" placeholder="Address">

                            </div>
                        </div>
                       <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select required id="type" name="type" class="form-control form-control-lg form-control-a" >
                                    <option value="member"> Member </option>
                                    <option value="user"> User </option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Contact No</label>
                                <input required type="text" id="Contactno" name="Contactno" class="form-control form-control-lg form-control-a" placeholder="Contact No">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit"  class="btn btn-b">Save</button>
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
            url: '<?php echo base_url() ?>index.php/Member/saveMember',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            error: function (request, error) {
                console.log(request);
                alert(" Email already Exist " );
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Create User / Member Success..");
                    location.reload();
            }
        });
    });
    
</script>