<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../assets/css/style.css"></link>
    <title>Report Form</title>
</head>
<body>
    <div id="inputPage">
        <form id="reportForm" type="POST" action="representReport.php" class="form">
            <div class="row">
                <!-- Student ID -->
                <div class="col">
                    <label for="studentID"><b>Student ID</b> <span class="requiredField">
                        *</span>
                </label>
                    <input id="student_id" type="number"
                    class="form-control"/>
                    <span id="idError" class="error"></span>
                </div>
            </div>
            <div class="row">
                <!-- First Name and Last Name -->
                <div class="col">
                    <label for="studentFirstName"><b>First Name</b> <span class="requiredField">
                        *</span></label>
                    <input id="student_first_name" type="text" 
                    class="form-control" placeholder="Enter First Name" 
                    />
                    <span id="fnameError" class="error"></span>
                </div>
                <div class="col">
                    <label for="studentLastName"><b>Last Name</b> <span class="requiredField">
                        *</span></label>
                    <input id="student_last_name" type="text" 
                    class="form-control" placeholder="Enter Last Name" 
                    />
                    <span id="lnameError" class="error"></span>
                </div>
            </div> 
            <div class="row">
                <!-- Batch/Class and Email -->
                <div class="col">
                    <label for="studentBatch"><b>Batch/Class</b> </label>
                    <input id="student_class_name" type="text" 
                    class="form-control" placeholder="Enter Batch/Class" 
                    />
                </div>
                <div class="col">
                    <label for="studentEmail"><b>Email ID</b> </label>
                    <input id="student_email_id" type="email" 
                    class="form-control" placeholder="email@example.com" 
                    />
                    <span id="emailIDError" class="error"></span>
                </div>
            </div> 
            <div id="subjects">
                <div class="row">
                    <div class="col text-center"><b>Subjects</b> 
                    <span class="requiredField">*</span></div>
                </div>
                <!-- English and Hindi -->
                <div class="row">
                    <div class="col">
                        <!-- Row 1 -->
                        <div class="row">
                            <!-- English -->
                            <div class="col">
                                <!-- English -->
                                <label for="englishSubject">English</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="englishMarks"
                                        class="form-control" />
                                        <span id="englishError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="englishOutoffMarks"
                                        class="form-control" value="100" readonly
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Row 1 -->
                        <div class="row">
                            <!-- Hindi -->
                            <div class="col">
                                
                                <label for="hindiSubject">Hindi</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="hindiMarks"
                                        class="form-control"/>
                                        <span id="hindiError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="hindiOutoffMarks"
                                        class="form-control" value="100" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Maths and Science -->
                <div class="row">
                    <div class="col">
                        <!-- Col 1 -->
                        <div class="row">
                            <!-- Math -->
                            <div class="col">
                                <!-- Math -->
                                <label for="mathSubject">Math</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="mathsMarks"
                                        class="form-control"/>
                                        <span id="mathsError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="mathOutoffMarks"
                                        class="form-control" value="100" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Col 2 -->
                        <div class="row">
                            <!-- Science -->
                            <div class="col">
                                <label for="scienceSubject">Science</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="scienceMarks"
                                        class="form-control"/>
                                        <span id="scienceError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="scienceOutoffMarks"
                                        class="form-control" value="100" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- History and Geography -->
                <div class="row">
                    <div class="col">
                        <!-- Col 1 -->
                        <div class="row">
                            <!-- History -->
                            <div class="col">
                                <label for="historySubject">History</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="historyMarks"
                                        class="form-control"/>
                                        <span id="historyError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="historyOutoffMarks"
                                        class="form-control" value="100" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Col 2 -->
                        <div class="row">
                            <!-- Geography -->
                            <div class="col">
                                <label for="geographySubject">Geography</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" steps="0.01" id="geographyMarks"
                                        class="form-control"/>
                                        <span id="geographyError" class="error"></span>
                                    </div>
                                    <span><h1>/</h1></span>
                                    <div class="col">
                                        <input type="number" id="geographyOutoffMarks"
                                        class="form-control" value="100" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col">
                    <label for="remark"><b>Remark</b></label>
                    <textarea id="remarkArea" 
                    class="form-control" maxlength="150" cols="30" rows="3"></textarea>
                </div>
            </div>
            <div class="text-center row">
                <div class="col text-center">
                    <button type="submit" id="submitBtn"
                    class="btn btn-primary">Generate Report Card</button>
                </div>
            </div>
        </form>
    </div>

    <script  src="../assets/js/jquery-3.6.4.min.js"></script>
    <script  src="../assets/js/bootstrap.min.js"></script>
    <script  src="../assets/js/script.js"></script>
    
</body>
</html>