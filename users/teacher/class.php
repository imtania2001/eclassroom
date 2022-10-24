<html lang="en">
    <head>...</head>
    <body class="bg-logo"></body>
    <div class="home">
        <div class="topdesign">...</div>
        <div class="action">
            <div class="profile" onclick="toggle();">...</div>
            <div class="menu">...</div>
            <div class="sc-header" style="background:transparent; ">...</div>
            <section class="page-container">
            <section class="page-containt">
                <div id="change-schedulelass">
                    <meta  carset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width,initial-scale=1.0">
                    <title>Document</title>
                    <style></style>
                    <div class="SC-form-container">
                    <div class="sc-action"></div>
                    <div id="change-table">
                    <div class="sc-heading">...</div>
                    <div class="table-list"style="overflow-x:auto; overflow-y:auto;">...</div>
                    <p class="text-center">No Record Found.</p>
                    </div>
                    </div>
                    <script></script>
                </div>
                <div style="height:100px; width:100%;"></div>
            </section>
            </section>
        </div>
        <!--<div class="back">
            <h2><a href="index.php">Go to Database</a></h2>
</div>
<div class="sc-header">
    <div class="sc-header-logo">
        <a href="index.php"><img src=""C:\Users\TANIA GHOSH\OneDrive\Desktop\e classroom\logo.png"></a>
</div>
<div class="sc-header-name">
    <a href="index.php"><h2>TIH College Space</h2></a>
</div>
</div>
<div id="change-scheduleclass">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charcet="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IF=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Document</title>
            <style>
                .table{
                    background:transparent;
                }
                .select select{
                    background:transparent;
                    width:111px;
                    border:none;
                    font-weight:bold;
                }
            </style>
            </head>
            </body>
            <div class="SC-form-container">
                <div class="sc-action">
            </div>
            <div id="change-table">
                <div class="sc-heading">
                    <div class="sc-heading-part">
                <button type="button" class="btn btn-success btn-lg btn-block" id="sc-list"onclick="ScheduleList()"disable>List of Classes</button>
            </div>
            <div class="sc-heading-part">
             <button type="button" class="btn btn-success btn-lg btn-block" id="sc-new"onclick="ScheduleNew()"disable>New Class</button>
             
            </div>
            </div>
            <div class="table-list" style="overflow-x:auto;overflow-y:auto;">
                <table class="table table-hover" id="header-fixed">
                    <tr class="fixed-row">
                        <th style="min-width:80px;">SL No</th>
                        <th class="select">
                            <select name="" id="FilterStream" onchange="FilterStream(this.value)">
                                <option value="all"selected>Stream</option>
                                 <option value=BCA>BCA</option> 
                                 <option value=BBA>BBA</option> 
                                 <option value=MCA>MCA</option> 
                                 <option value=MSC>MSC</option>
            </select>
            </th>
            <th class="select">
                 <select name="" id="FilterSemister" onchange="FilterSemister(this.value)">
                     <option value="all"selected>Stream</option>
                                 <option value="all"selected>Sem</option> 
                                 <option value=SEM1>SEM1</option> 
                                 <option value=SEM2>SEM2</option> 
                                 <option value=SEM3>SEM3</option>
                                 <option value=SEM4>SEM4</option>
                                 <option value=SEM5>SEM5</option>
                                 <option value=SEM6>SEM6</option>
            </select>
            </th>
            <th class="select">
                 <select name="" id="FilterSection" onchange="FilterSection(this.value)">
                <option value="all"selected>Section</option>
                 <option value="Alpha">Alpha</option> 
                 <option value="Beta">Beta</option> 
                 <option value="Combined">Combined</option>
            </select>
            </th>
            <th class="select">
                 <select name="" id="FilterDate" onchange="FilterDate(this.value)">
                <option value="all"selected>Date</option>
                 <option value="today">Today</option> 
                 <option value="tommorow">Tommorow</option> 
                 <option value="week">This week</option>
                 <option value="month">This month</option>
            </select>
            </th>
            <th>Time</th>
            </tr>
            </table>
            </div>
                    <p class="text-center">No Record Found.</p>
            </div>
            <script>
                function FilterStream(stremget){
                    semget=$("#FilterSemister").val();
                    sectionget=$("#FilterDateSection").val();
                    dateget=$("#FilterDate").val();
                    $.ajax({
                        type:'post',
                        url:'scheduleclassfilter.php';
                        data:{stream:streaget, date:dateget, sem:semget, section:sectionget, fun:"stream"},
                        success:function(data){
                            $('#change-table').html(data);
                        }
                    })
                }
                function FilterSemesterSC(semget){
                    streamget=$("#FilterStream").val();
                    // semget=$("#FilterSemister").val();

                    sectionget=$("#FilterSection").val();
                    dateget=$("#FilterDate").val();
                    $.ajax({
                        type:'post',
                        url:'scheduleclassfilter.php';
                        data:{stream:streaget, date:dateget, sem:semget, section:sectionget, fun:"stream"},
                        success:function(data){
                            $('#change-table').html(data);
                        }
                        
                    })
                }
                function FilterSection(sectionget){
                    streamget=$("#FilterStream").val();
                    semget=$("#FilterSemister").val();

                    //sectionget=$("#FilterSection").val();
                    dateget=$("#FilterDate").val();
                    $.ajax({
                        type:'post',
                        url:'scheduleclassfilter.php';
                        data:{stream:streaget, date:dateget, sem:semget, section:sectionget, fun:"stream"},
                        success:function(data){
                            $('#change-table').html(data);
                        }

                    })
                }
                function FilterDate(dateget){
                    streamget=$("#FilterStream").val();
                    semget=$("#FilterSemister").val();
                    sectionget=$("#FilterSection").val();
                    $.ajax({
                        type:'post',
                        url:'scheduleclassfilter.php';
                        data:{stream:streaget, date:dateget, sem:semget, section:sectionget, fun:"stream"},
                        success:function(data){
                            $('#change-table').html(data);
                        }
                    })
                }
                $(document).ready(function(){









               $('#SC-new').click(function(){
                //$.get('get.html',function(data,status){
                    //$('#changehere').html(data);
                    //alert(status);
                    //})
                $.post('scheduleclassform.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $('#sc-list').click(function(){
                //$.get('get.html',function(data,status){
                    //$('#changehere').html(data);
                    //alert(status);
                    //})
                $.post('scheduleclassform.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $(document).on('click','tr[date-role=view]',function(){
                //alert($(this).data('id'));
                var dataid=$(this).data('id');
                $.post('scheduleclassview.php',{
                    viewid: dataid},
                    function(data,status){
                        $('#change-scheduleclass').html(data);
                    })
                });
            });
        </script>
        </body>
        </html>      </div>
        -->





