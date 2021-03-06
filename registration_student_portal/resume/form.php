<?php
   session_start();
   require_once("includes/settings.php");
   require_once("includes/database.php");
   require_once("includes/functions/common.php");
   require_once("includes/classes/db.cls.php");
   require_once("includes/classes/sitedata.cls.php");
   $db=new SiteData();
   
      if (!is_loggedin()) {
         redirect('login.php');
      }
      $uid = $_SESSION[SES]['user'];
      $sql = "SELECT * FROM ".STUD_DETAILS." WHERE ldapid = '$uid'";
      $stud_data = $db->getData($sql);
      $sql = "SELECT * FROM ".ACAD_DETAILS." WHERE ldapid = '$uid'";
      $acad_data = $db->getData($sql);
      $sql = "SELECT * FROM ".TECH_SKILL." WHERE ldapid = '$uid'";
      $tech_skill = $db->getData($sql);
      $sql = "SELECT * FROM ".ACHIVE_DETAILS." WHERE ldapid = '$uid'";
      $achive_data = $db->getData($sql);
      $sql = "SELECT * FROM ".INTERN_DETAILS." WHERE ldapid = '$uid'";
      $intern_data = $db->getData($sql);
      $sql = "SELECT * FROM ".TECH_SKILL." WHERE ldapid = '$uid'";
      $techskill_data = $db->getData($sql);
      $sql = "SELECT * FROM ".RESPONSIBILITY." WHERE ldapid = '$uid'";
      $responsbility_data = $db->getData($sql);
      $sql = "SELECT * FROM ".WORK_EXP." WHERE ldapid = '$uid'";
      $work_experience = $db->getData($sql);
      $sql = "SELECT * FROM ".PROJECT_DETAILS." WHERE ldapid = '$uid'";
      $projects = $db->getData($sql);
      $sql = "SELECT * FROM ".EXTRA_CURR_ACTIVITY." WHERE ldapid = '$uid'";
      $extra_curr_activity = $db->getData($sql);
   ?>

<?php include('includes/templates/header.php'); ?>
<body>
   <?php include('includes/templates/navMenu.php'); ?>
   <div class="container-fluid">
      <div class="panel-group">
         <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: #000;">Fill out the form<span style="color: #FFFFFF; float: right;"><?php echo $_SESSION[SES]['uname']; ?><b style="color: #000000;"> (<?php echo $_SESSION[SES]['email']; ?>)</b></span></div>
            <div class="panel-body">
              <p><span style="color: red;">All * marked are required</span></p>
              <?php
              getMessage();
              ?>
               <form class="form-horizontal" method="post" action="<?=BASE_URL?>formAction.php">
                  <div class="col-md-12 col-xs-12">
                    <div class="panel panel-info">
                     <div class="panel-heading">Personal Details</div>
                       <div class="panel-body">
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group">
                          <label class="control-label col-sm-2">Name <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="usr_name" value="<?php echo $stud_data['oDATA'][0]['name']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2">Roll No <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="usr_roll" value="<?php echo $stud_data['oDATA'][0]['roll_number']; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2">DoB <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input class="form-control" id="date" name="usr_dob" placeholder="DD/MM/YYYY" type="text" value="<?php echo $stud_data['oDATA'][0]['dob']; ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2">Degree <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="usr_degree">
                              <?php if ($stud_data['NO_OF_ITEMS'] > 0) { ?> 
                              <option value="<?php echo $stud_data['oDATA'][0]['degree'] ?>"><?php echo $stud_data['oDATA'][0]['degree'] ?></option>
                              <?php
                            }?>
                              <option>--select--</option>
                              <option value="B.Tech">B.Tech</option>
                              <option value="M.Tech">M.Tech</option>
                              <option value="B.Sc.">B.Sc.</option>
                              <option value="M.Sc.">M.Sc.</option>
                              <option value="Ph.D.">Ph.D.</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2">Branch <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="usr_branch">
                              <?php if ($stud_data['NO_OF_ITEMS'] > 0) { ?> 
                              <option value="<?php echo $stud_data['oDATA'][0]['branch'] ?>"><?php echo $stud_data['oDATA'][0]['branch'] ?></option>
                              <?php
                            }?>
                              <option>--select--</option>
                              <option value="Electrical Engineering and Computer Science">Electrical Engineering and Computer Science</option>
                              <option value="Mechanical Engineering">Mechanical Engineering</option>
                              <option value="Chemistry">Chemistry</option>
                              <option value="Mathematics">Mathematics</option>
                              <option value="Physics">Physics</option>
                              <option value="Liberal Arts">Liberal Arts</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2">Semester <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="usr_semester" value="<?php echo $stud_data['oDATA'][0]['semester']; ?>">
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Email ID <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="usr_email" value="<?php echo $stud_data['oDATA'][0]['email']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2">Phone No <span style="color: red;">*</span>:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="usr_phno" value="<?php echo $stud_data['oDATA'][0]['phone']; ?>">
                          </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Present address :</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" rows="4" name="usr_preaddr"><?php echo $stud_data['oDATA'][0]['present_addr']; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Permanent address :</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" rows="4" name="usr_peraddr"><?php echo $stud_data['oDATA'][0]['permanent_addr']; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Dream Company :</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="dream_company" value="<?php echo $stud_data['oDATA'][0]['dream_company']; ?>">
                            </div>
                          </div>
                        </div>
                       </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                    <div class="panel panel-info">
                     <div class="panel-heading">EDUCATIONAL QUALIFICATION(S) :(Note:All fields are mandatory.If not applicable please write "NA" or "0" or ".")</div>
                       <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover table-responsive">
                          <thead>
                            <tr>
                              <th>Degree / Examination</th>
                              <th>University / Institution / Board</th>
                              <th>Year</th>
                              <th>Discipline</th>
                              <th>Marks / GPA / CGPA</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="exam1" value="<?php echo $acad_data['oDATA'][0]['exam']; ?>">
                              </td>
                              <td><input type="text" name="board1" class="form-control" value="<?php echo $acad_data['oDATA'][0]['board']; ?>"></td>
                              <td><input type="text" name="year1" class="form-control" value="<?php echo $acad_data['oDATA'][0]['year']; ?>"></td>
                              <td><input type="text" name="discipline1" class="form-control" value="<?php echo $acad_data['oDATA'][0]['discipline']; ?>"></td>
                              <td><input type="text" name="marks1" class="form-control" value="<?php echo $acad_data['oDATA'][0]['marks']; ?>"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="exam2" value="<?php echo $acad_data['oDATA'][1]['exam']; ?>">
                              </td>
                              <td><input type="text" name="board2" class="form-control" value="<?php echo $acad_data['oDATA'][1]['board']; ?>"></td>
                              <td><input type="text" name="year2" class="form-control" value="<?php echo $acad_data['oDATA'][1]['year']; ?>"></td>
                              <td><input type="text" name="discipline2" class="form-control" value="<?php echo $acad_data['oDATA'][1]['discipline']; ?>"></td>
                              <td><input type="text" name="marks2" class="form-control" value="<?php echo $acad_data['oDATA'][1]['marks']; ?>"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="exam3" value="<?php echo $acad_data['oDATA'][2]['exam']; ?>">
                              </td>
                              <td><input type="text" name="board3" class="form-control" value="<?php echo $acad_data['oDATA'][2]['board']; ?>"></td>
                              <td><input type="text" name="year3" class="form-control" value="<?php echo $acad_data['oDATA'][2]['year']; ?>"></td>
                              <td><input type="text" name="discipline3" class="form-control" value="<?php echo $acad_data['oDATA'][2]['discipline']; ?>"></td>
                              <td><input type="text" name="marks3" class="form-control" value="<?php echo $acad_data['oDATA'][2]['marks']; ?>"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="exam4" value="<?php echo $acad_data['oDATA'][3]['exam']; ?>">
                              </td>
                              <td><input type="text" name="board4" class="form-control" value="<?php echo $acad_data['oDATA'][3]['board']; ?>"></td>
                              <td><input type="text" name="year4" class="form-control" value="<?php echo $acad_data['oDATA'][3]['year']; ?>"></td>
                              <td><input type="text" name="discipline4" class="form-control" value="<?php echo $acad_data['oDATA'][3]['discipline']; ?>"></td>
                              <td><input type="text" name="marks4" class="form-control" value="<?php echo $acad_data['oDATA'][3]['marks']; ?>"></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="exam5" value="<?php echo $acad_data['oDATA'][4]['exam']; ?>">
                              </td>
                              <td><input type="text" name="board5" class="form-control" value="<?php echo $acad_data['oDATA'][4]['board']; ?>"></td>
                              <td><input type="text" name="year5" class="form-control" value="<?php echo $acad_data['oDATA'][4]['year']; ?>"></td>
                              <td><input type="text" name="discipline5" class="form-control" value="<?php echo $acad_data['oDATA'][4]['discipline']; ?>"></td>
                              <td><input type="text" name="marks5" class="form-control" value="<?php echo $acad_data['oDATA'][4]['marks']; ?>"></td>
                            </tr>
                            <tr>
                              <td><input type="text" name="exam6" class="form-control" value="<?php echo $acad_data['oDATA'][5]['exam']; ?>"></td>
                              <td><input type="text" name="board6" class="form-control" value="<?php echo $acad_data['oDATA'][5]['board']; ?>"></td>
                              <td><input type="text" name="year6" class="form-control" value="<?php echo $acad_data['oDATA'][5]['year']; ?>"></td>
                              <td><input type="text" name="discipline6" class="form-control" value="<?php echo $acad_data['oDATA'][5]['discipline']; ?>"></td>
                              <td><input type="text" name="marks6" class="form-control" value="<?php echo $acad_data['oDATA'][5]['marks']; ?>"></td>
                            </tr>
                          </tbody>
                        </table>
                       </div>
                    </div>
                  </div> 
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">TECHNICAL SKILLS <span style="color: red;">(Note: Write with ',' separated)</span></div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table2">
                              <tr>
                                <th>Skill Name</th>
                              </tr>
                              <?php
                                if ($techskill_data['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $techskill_data['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="95%">
                                  <input type="text" name="sk_skill[]" class="form-control" id="skill1" value="<?php echo $techskill_data['oDATA'][$i]['skill_name']; ?>">
                                </td>
                              <?php }?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow1('table2', 'sk_skill', 'skill', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="95%"><input type="text" name="sk_skill[]" class="form-control" id="skill1"></td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow1('table2', 'sk_skill', 'skill', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">SCHOLASTIC ACHIEVEMENT(S)</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table1">
                              <tr>
                                <th>Achievement</th>
                                <th>Year</th>
                              </tr>
                              <?php
                                if ($achive_data['NO_OF_ITEMS'] > 0) {

                                  for ($i=0; $i < $achive_data['NO_OF_ITEMS']; $i++) {
                              ?>
                                    <tr>
                                      <td width="70%">
                                        <input type="text" name="sa_name[]" class="form-control" id="spec1" value="<?php echo $achive_data['oDATA'][$i]['achievement']; ?>">
                                      </td>
                                      <td width="25%">
                                        <input type="text" name="sa_year[]" class="form-control" id="spec2" value="<?php echo $achive_data['oDATA'][$i]['year']; ?>">
                                      </td>
                              <?php 
                                  }
                              ?>
                                      <td>
                                        <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table1', 'sa_name', 'sa_year', 'spec', '0')">
                                      </td>
                                    </tr>
                              <?php

                                }else{
                              ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="sa_name[]" class="form-control" id="spec1">
                                </td>
                                <td width="25%">
                                  <input type="text" name="sa_year[]" class="form-control" id="spec2">
                                </td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table1', 'sa_name', 'sa_year', 'spec', '0')">
                                </td>
                              </tr>
                              <?php
                                }
                              ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">INTERNSHIP(S)</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table3">
                              <tr>
                                <th>Name of the company</th>
                                <th>Duration</th>
                              </tr>
                              <?php
                                if ($intern_data['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $intern_data['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="in_name[]" class="form-control" id="intern1" value="<?php echo $intern_data['oDATA'][$i]['company']; ?>">
                                </td>
                                <td width="25%">
                                  <input type="text" name="in_duration[]" class="form-control" id="intern2" value="<?php echo $intern_data['oDATA'][$i]['duration']; ?>">
                                </td>
                              <?php } ?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table3', 'in_name', 'in_duration', 'intern', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="70%"><input type="text" name="in_name[]" class="form-control" id="intern1"></td>
                                <td width="25%"><input type="text" name="in_duration[]" class="form-control" id="intern1"></td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table3', 'in_name', 'in_duration', 'intern', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">POSITION(S) OF RESPONSIBILITY</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table4">
                              <tr>
                                <th>Name of the position held</th>
                                <th>Period</th>
                              </tr>
                              <?php
                                if ($responsbility_data['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $responsbility_data['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="por_name[]" class="form-control" id="por1" value="<?php echo $responsbility_data['oDATA'][$i]['position_held']; ?>">
                                </td>
                                <td width="25%">
                                  <input type="text" name="por_duration[]" class="form-control" id="por2" value="<?php echo $responsbility_data['oDATA'][$i]['period']; ?>">
                                </td>
                              <?php } ?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table4', 'por_name', 'por_duration', 'por', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="por_name[]" class="form-control" id="por1">
                                </td>
                                <td width="25%">
                                  <input type="text" name="por_duration[]" class="form-control" id="por2">
                                </td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table4', 'por_name', 'por_duration', 'por', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">WORK EXPERIENCE(S)</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table5">
                              <tr>
                                <th>Name of the company</th>
                                <th>Duration in the company</th>
                              </tr>
                              <?php
                                if ($work_experience['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $work_experience['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="we_name[]" class="form-control" id="we1" value="<?php echo $work_experience['oDATA'][$i]['company']; ?>">
                                </td>
                                <td width="25%">
                                  <input type="text" name="we_duration[]" class="form-control" id="we2" value="<?php echo $work_experience['oDATA'][$i]['duration']; ?>">
                                </td>
                              <?php } ?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table5', 'we_name', 'we_duration', 'we', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="we_name[]" class="form-control" id="we1">
                                </td>
                                <td width="25%">
                                  <input type="text" name="we_duration[]" class="form-control" id="we2">
                                </td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table5', 'we_name', 'we_duration', 'we', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">PROJECT(S)</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table6">
                              <tr>
                                <th>Project title</th>
                                <th>Duration</th>
                              </tr>
                              <?php
                                if ($projects['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $projects['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="pr_name[]" class="form-control" id="pr1" value="<?php echo $projects['oDATA'][$i]['title']; ?>">
                                </td>
                                <td width="25%">
                                  <input type="text" name="pr_duration[]" class="form-control" id="pr2" value="<?php echo $projects['oDATA'][$i]['duration']; ?>">
                                </td>
                              <?php } ?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table6', 'pr_name', 'pr_duration', 'pr', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="70%">
                                  <input type="text" name="pr_name[]" class="form-control" id="pr1">
                                </td>
                                <td width="25%">
                                  <input type="text" name="pr_duration[]" class="form-control" id="pr2">
                                </td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow('table6', 'pr_name', 'pr_duration', 'pr', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div>
                 <div class="col-md-12 col-xs-12">
                    <p><br></p>
                       <div class="panel panel-info">
                          <div class="panel-heading">EXTRA-CURRICULAR ACTIVITIES</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-responsive" id="table7">
                              <tr>
                                <th>Activity</th>
                              </tr>
                              <?php
                                if ($extra_curr_activity['NO_OF_ITEMS'] > 0) {
                                  for ($i=0; $i < $extra_curr_activity['NO_OF_ITEMS']; $i++) {
                              ?>
                              <tr>
                                <td width="95%">
                                  <input type="text" name="eca_activity[]" class="form-control" id="eca1" value="<?php echo $extra_curr_activity['oDATA'][$i]['activity']; ?>">
                                </td>
                              <?php } ?>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow1('table7', 'eca_activity', 'eca', '0')">
                                </td>
                              </tr>
                            <?php }else{ ?>
                              <tr>
                                <td width="95%">
                                  <input type="text" name="eca_activity[]" class="form-control" id="eca1">
                                </td>
                                <td>
                                  <input type="button" class="btn btn-success" style="cursor: pointer;" value="Add row" onclick="addRow1('table7', 'eca_activity', 'eca', '0')">
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                          </div>
                       </div>                 
                  </div> 
                  <div>
                    <span><input type="submit" name="save-data" value="Save" class="btn btn-primary" style="margin-left:45%; margin-top:1%;" /></span>
                    <span><input type="submit" name="submit-data" value="Submit" class="btn btn-success" style="margin-top:1%;" /></span>
                  </div>
               </form>
               
            </div>
         </div>
      </div>
   </div>
   <?php include('includes/templates/footer.php'); ?>