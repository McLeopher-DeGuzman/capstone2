
<?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <!-- <div>EXAMINEE RESULT</div> -->
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Ratings on the Career Advice Consultation Exam
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <th>Subject</th>
                                <th>Course Recommendation</th>
                            </tr>
                            <thead>
                                <tbody>
                                    <th> <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php echo $selScore->rowCount(); ?>
                                <?php 
                                    $over  = $selExam['ex_questlimit_display'];
                                 ?>
                                 /<?php echo $over; ?></th>
                                 <th><?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                
                                <?php
                                    $score = $selScore->rowCount();
                                    $ans = $score / $over * 100;
                                    $formattedAns = number_format($ans, 2);

                                    echo $formattedAns . "%";

                                    $subject = ""; // Initialize the subject variable

                                    if ($formattedAns >= 30.00 && $formattedAns <= 40.00) {
                                        $subject = "logic"; // Assign the subject they excel in
                                    } elseif ($formattedAns >= 40.00 && $formattedAns <= 50.00) {
                                        echo " ";
                                        $subject = "bsba"; // Assign the subject they excel in
                                    } else {
                                        echo " Unknown subject"; // Default case if the percentage doesn't match any subject
                                        $subject = "unknown";
                                    }

                                    // Now you can use the $subject variable to further process or display the subject they excel in
                                    
                                    ?>
                                    <th><?php  echo " " . $subject;
                                    ?></th>
                                    <th>
                                    <?php
                                if ($formattedAns >= 30.00 && $formattedAns <= 40.00) {
                                    echo " bsit";
                                }
                                elseif ($formattedAns >= 40.00 && $formattedAns <= 50.00) {
                                    echo "Bachelor Of Walang Kwenta";
                                }
                                ?> 
                                    </th>
                                    </th>
                                </tbody>