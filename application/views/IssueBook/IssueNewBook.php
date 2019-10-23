<?php ?>
<?php ?>
<!--/ Form Search Star /-->

<div class="row" style="margin-top: 100px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">Issue Book</h3>
            </div>
            <div class="box form">
               <form class="form-a" method="post" id="submit">
                    <div class="row">

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Date</label>
                                <input type="date" id="date" required name="date" class="form-control form-control-lg form-control-a" >

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Member ID</label>
                                <input type="text" id="mid" name="mid" required class="form-control form-control-lg form-control-a" placeholder="Member Id">

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Member Name</label>
                                <input type="text" id="name" name="name" required class="form-control form-control-lg form-control-a" placeholder="Member Name">

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Book ID</label>
                                <input type="text" id="bid" name="bid" required class="form-control form-control-lg form-control-a" placeholder="Book Id">

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Book Name</label>
                                <input type="text" required class="form-control form-control-lg form-control-a" name="bName" id="bName">

                            </div>
                        </div>



                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Return Date</label>
                                <input type="Date" id="rDate" required name="rDate" class="form-control form-control-lg form-control-a" >

                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-b">Save</button>
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
    $(document).ready(function () {
        console.log("ready!");
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear() + "-" + (month) + "-" + (day);

        $('#date').val(today);
    });



    $("#mid").change(function () {
        var mid = document.getElementById('mid').value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Member/getMember/' + mid,
            type: 'post',
            success: function (data)
            {
                var obj = JSON.parse(data);
                document.getElementById('name').value = obj.name+"";
            }
        });
    });

    $("#bid").change(function () {

        var bid = document.getElementById('bid').value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Book/getBook/' + bid,
            type: 'post',
            success: function (data)
            {
                var obj = JSON.parse(data);
                document.getElementById('bName').value = obj.name+"";

            }
        });
    });


    $('#submit').submit(function (e) {
        
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Issue/IssueBook',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            error: function (request, error) {
                console.log(request);
                alert(" Email already Exist "+error );
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Issue Book Success..");
                location.reload();
            }
        });
    });
    
</script>