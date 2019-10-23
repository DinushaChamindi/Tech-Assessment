<?php ?>
<?php ?>
<!--/ Form Search Star /-->

<div class="row" style="margin-top: 100px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">New Book</h3>
            </div>
            <div class="box form">
                <form class="form-a" method="post" id="submit">
                    <div class="row">

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Book Name</label>
                                <input type="text" id="name" required  name="name" class="form-control form-control-lg form-control-a" placeholder="Book Name">

                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="city">Auther</label>
                                <input type="text" required id="auther" name="auther" class="form-control form-control-lg form-control-a" placeholder="Auther">

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Category</label>
                                <select required id="Category" name="Category" class="form-control form-control-lg form-control-a" id="Type">
                                    <?php if(!empty($categories)){
                                        foreach($categories as $category){
                                            ?>
                                    <option value="<?php echo $category['Id']; ?>"><?php echo $category['categoryName']; ?></option>
                                    <?php
                                        }
                                    } ?>
                                    
                                    
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Price</label>
                                <input required type="number" id="price" name="price" class="form-control form-control-lg form-control-a" placeholder="price">

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
            url: '<?php echo base_url() ?>index.php/Book/saveBook',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            error: function (request, error) {
                console.log(request);
                alert(" Can't do because: " + error);
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Create Book Success..");
                    location.reload();
            }
        });
    });
    
</script>