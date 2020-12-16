<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Limda | Domain names</title>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }

</style>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->


</head>
<body style="padding: 70px;">
    <h5 class="host-plans-title-non-index">check out the  <span>Other Domain Extensions</span></h5>
    <div class="row">
        <div class="col-md-12">
            <div>
                    <div class="dmain-table-holder" id="domains">
                        <div class="dmain-table">
                            <div class="row thead">
                                <div class="col-xs-2 col-sm-3 th">Domain</div>
                                <div class="col-xs-3 col-sm-3 th">Registration</div>
                                <div class="col-xs-3 col-sm-3 th">Transfer</div>
                                <div class="search-box col-xs-4 col-sm-3 th">
                                    <input type="text" autocomplete="off" placeholder="Search domain.." />
                                </div>
                            </div>

                            <div class="dom" id="pagination_data">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    $(document).ready(function(){
        load_data();
        function load_data(page, search)  
        {  
             $.ajax({  
                  url:"pagination.php",  
                  method:"POST",  
                  data:{page:page, search:search},  
                  success:function(data){  
                       $('#pagination_data').html(data);  
                  }  
             }) 
             //console.log("ajax"); 
        }

        $(document).on('click', '.pagination_link', function(){  
             var page = $(this).attr("id");
             var search = $(this).attr("data-str");
             load_data(page, search);  
        });  


        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();

            if(inputVal.length){
                $.ajax({
                    url: "pagination.php",
                    method: "POST",
                    data: {term: inputVal, search: inputVal},
                    success: function(data){
                        $(".dom").html(data);
                    }
                })

            } else{
                load_data();
            }
        });
    });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>