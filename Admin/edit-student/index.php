<!-- This file is to to edit Student data present in the database with data from the USER. -->
<?php
include('../extra/header.php');

//To only llow admin's to access this file.
echo Access();

//Get usn from Session .
$usn = $_SESSION['usn'];

// Query is used to get all the details from database.
$query = "SELECT * FROM stud_details s JOIN personal_details p on s.USN=p.USN JOIN parents_details pd on s.USN=pd.USN JOIN images i ON i.USN=s.USN WHERE s.USN = '$usn'";
$query_run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
?>
<!-- This fields is used to diaplay data and edit them and send them to edit_student.php . -->
    <main class="col-md-auto ms-sm-auto col-lg-auto px-md-15 justify-content-center">
        <center>
            <div class="container">
                <form action="edit_student.php" method="post" enctype='multipart/form-data'>
                    <h3><b><u>Student Details</u></b></h3>
                    <br>
                    <div class="form-group">
                        <div class="thumbnail">
                            <?php echo "<img src='../../Student/upload/" . $row['stud_image'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputusn" class="col-sm-5 col-form-label"><b>USN</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required value="<?php echo $row['USN'] ?>" name="usn" title="please enter a valid USN." pattern="^\d{5}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputusn" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-5 col-form-label"><b>Student Name</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" id="inputname" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputstudimage" class="col-sm-5 col-form-label"><b>Student Image : </b></label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="stud_image" id="inputstudimage">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputcourse" class="col-sm-5 col-form-label"><b>Course : </b></label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputcourse" name='course' required>
                                <option value="<?php echo $row['course'] ?>" selected>Selected:<?php echo $row['course'] ?></option>
                                <option value="Computer Science Engineering">Computer Science Engineering</option>
                                <option value="Electronic and communication Engineering">Electronic and communication Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Chemical Engineering">Chemical Engineering</option>
                                <option value="Biomedical Engineering">Biomedical Engineering</option>
                                <option value="Aerospace Engineering">Aerospace Engineering</option>
                                <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputsem" class="col-sm-5 col-form-label"><b>Semester : </b></label>
                        <div class="col-sm-5">
                            <select class="form-control" id="inputsem" name="sem" required>
                                <option value="<?php echo $row['sem'] ?>" selected>Selected:<?php echo $row['sem'] ?></option>
                                <option value="1">1'st</option>
                                <option value="2">2'nd</option>
                                <option value="3">3'rd</option>
                                <option value="4">4'th</option>
                                <option value="5">5'th</option>
                                <option value="6">6'th</option>
                                <option value="7">7'th</option>
                                <option value="8">8'th</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputyear" class="col-sm-5 col-form-label"><b>Batch Year : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputyear" name="batchyear" value="<?php echo $row['batchyear'] ?>" title="please enter a valid Year." pattern="^(19|20)\d{2}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" required>
                        </div>
                    </div>
                    <br>
                    <h3><b><u>Personal Detail</u></b></h3>
                    <br>
                    <div class="form-group row">
                        <label for="inputdob" class="col-sm-5 col-form-label"><b>DOB : </b></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="dob" id="inputdob" value="<?php echo $row['dob'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputgen" class="col-sm-5 col-form-label"><b>Gender : </b></label>
                        <div class="col-sm-5">
                            <select name='gender' class="form-control" id="inputgen" required>
                                <option value="<?php echo $row['gender'] ?>">Selected:<?php echo $row['gender'] ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Not Mention">Not Mention</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputbg" class="col-sm-5 col-form-label"><b>Blood Group : </b></label>
                        <div class="col-sm-5">
                            <select name="blood" class="form-control" id="inputbg" required>
                                <option value="<?php echo $row['blood'] ?>" selected>Selected:<?php echo $row['blood'] ?></option>
                                <option value="A +ve">A +ve</option>
                                <option value="B +ve">B +ve</option>
                                <option value="A -ve">A -ve</option>
                                <option value="B -ve">B -ve</option>
                                <option value="AB +ve">AB +ve</option>
                                <option value="AB -ve">AB -ve</option>
                                <option value="O +ve">O +ve</option>
                                <option value="O -ve">O -ve</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputph" class="col-sm-5 col-form-label"><b>Phone Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="ph_no" value="<?php echo $row['ph_no'] ?>" title=" Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputph">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-5 col-form-label"><b>Email:</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="email" value="<?php echo $row['email'] ?>" title="please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputemail">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputaddress" class="col-sm-5 col-form-label"><b>Address : </b></label>
                        <div class="col-sm-5">
                            <textarea rows="3" cols="40" class="form-control" name="address" id="inputaddress" required><?php echo $row['address'] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputnat" class="col-sm-5 col-form-label"><b>Nationality* : </b></label>
                        <div class="col-sm-5">
                            <select name="nat" class="form-control" id="inputnat" required>
                                <option value="<?php echo $row['nat'] ?>" selected>Selected:<?php echo $row['nat'] ?></option>
                                <option value="India" selected>India</option>
                                <option value="U.S.A">U.S.A</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputstate" class="col-sm-5 col-form-label"><b>State : </b></label>
                        <div class="col-sm-5">
                            <select name="state" class="form-control" id="inputstate" required>
                                <option value="<?php echo $row['state'] ?>" selected>Selected:<?php echo $row['state'] ?></option>
                                <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                <option value='Assam'>Assam</option>
                                <option value='Bihar'>Bihar</option>
                                <option value='Chandigarh'>Chandigarh</option>
                                <option value='Chhattisgarh'>Chhattisgarh</option>
                                <option value='Delhi'>Delhi</option>
                                <option value='Goa'>Goa</option>
                                <option value='Gujarat'>Gujarat</option>
                                <option value='Haryana'>Haryana</option>
                                <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                <option value='Jharkhand'>Jharkhand</option>
                                <option value='Karnataka'>Karnataka</option>
                                <option value='Kerala'>Kerala</option>
                                <option value='Lakshadweep'>Lakshadweep</option>
                                <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                <option value='Maharashtra'>Maharashtra</option>
                                <option value='Manipur'>Manipur</option>
                                <option value='Meghalaya'>Meghalaya</option>
                                <option value='Mizoram'>Mizoram</option>
                                <option value='Nagaland'>Nagaland</option>
                                <option value='Odisha'>Odisha</option>
                                <option value='Puducherry'>Puducherry</option>
                                <option value='Punjab'>Punjab</option>
                                <option value='Rajasthan'>Rajasthan</option>
                                <option value='Sikkim'>Sikkim</option>
                                <option value='Tamil Nadu'>Tamil Nadu</option>
                                <option value='Telangana'>Telangana</option>
                                <option value='Tripura'>Tripura</option>
                                <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                <option value='Uttarakhand'>Uttarakhand</option>
                                <option value='West Bengal'>West Bengal</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputcity" class="col-sm-5 col-form-label"><b>City : </b></label>
                        <div class="col-sm-5">
                            <select class="form-control" name="city" id="inputcity" required>
                                <option value='Adilabad'>Adilabad</option>
                                <option value='Agra'>Agra</option>
                                <option value='Ahmedabad'>Ahmedabad</option>
                                <option value='Ahmednagar'>Ahmednagar</option>
                                <option value='Aizawl'>Aizawl</option>
                                <option value='Ajmer'>Ajmer</option>
                                <option value='Akola'>Akola</option>
                                <option value='Alappuzha'>Alappuzha</option>
                                <option value='Aligarh'>Aligarh</option>
                                <option value='Alipurduar'>Alipurduar</option>
                                <option value='Alirajpur'>Alirajpur</option>
                                <option value='Allahabad'>Allahabad</option>
                                <option value='Almora'>Almora</option>
                                <option value='Alwar'>Alwar</option>
                                <option value='Ambala'>Ambala</option>
                                <option value='Ambedkar Nagar'>Ambedkar Nagar</option>
                                <option value='Amravati'>Amravati</option>
                                <option value='Amreli'>Amreli</option>
                                <option value='Amritsar'>Amritsar</option>
                                <option value='Anand'>Anand</option>
                                <option value='Anantapur'>Anantapur</option>
                                <option value='Anantnag'>Anantnag</option>
                                <option value='Angul'>Angul</option>
                                <option value='Anjaw'>Anjaw</option>
                                <option value='Anuppur'>Anuppur</option>
                                <option value='Araria'>Araria</option>
                                <option value='Aravalli'>Aravalli</option>
                                <option value='Ariyalur'>Ariyalur</option>
                                <option value='Arwal'>Arwal</option>
                                <option value='Ashoknagar'>Ashoknagar</option>
                                <option value='Auraiya'>Auraiya</option>
                                <option value='Aurangabad'>Aurangabad</option>
                                <option value='Aurangabad'>Aurangabad</option>
                                <option value='Azamgarh'>Azamgarh</option>
                                <option value='Bagalkot'>Bagalkot</option>
                                <option value='Bageshwar'>Bageshwar</option>
                                <option value='Baghpat'>Baghpat</option>
                                <option value='Bahraich'>Bahraich</option>
                                <option value='Baksa'>Baksa</option>
                                <option value='Balaghat'>Balaghat</option>
                                <option value='Balangir'>Balangir</option>
                                <option value='Balasore'>Balasore</option>
                                <option value='Ballia'>Ballia</option>
                                <option value='Balod'>Balod</option>
                                <option value='Baloda Bazar'>Baloda Bazar</option>
                                <option value='Balrampur'>Balrampur</option>
                                <option value='Balrampur'>Balrampur</option>
                                <option value='Banaskantha (Palanpur)'>Banaskantha (Palanpur)</option>
                                <option value='Banda'>Banda</option>
                                <option value='Bandipora'>Bandipora</option>
                                <option value='Bangalore Rural'>Bangalore Rural</option>
                                <option value='Bangalore Urban'>Bangalore Urban</option>
                                <option value='Banka'>Banka</option>
                                <option value='Bankura'>Bankura</option>
                                <option value='Banswara'>Banswara</option>
                                <option value='Barabanki'>Barabanki</option>
                                <option value='Baramulla'>Baramulla</option>
                                <option value='Baran'>Baran</option>
                                <option value='Bareilly'>Bareilly</option>
                                <option value='Bargarh'>Bargarh</option>
                                <option value='Barmer'>Barmer</option>
                                <option value='Barnala'>Barnala</option>
                                <option value='Barpeta'>Barpeta</option>
                                <option value='Barwani'>Barwani</option>
                                <option value='Bastar'>Bastar</option>
                                <option value='Basti'>Basti</option>
                                <option value='Bathinda'>Bathinda</option>
                                <option value='Beed'>Beed</option>
                                <option value='Begusarai'>Begusarai</option>
                                <option value='Belgaum'>Belgaum</option>
                                <option value='Bellary'>Bellary</option>
                                <option value='Bemetara'>Bemetara</option>
                                <option value='Betul'>Betul</option>
                                <option value='Bhadrak'>Bhadrak</option>
                                <option value='Bhagalpur'>Bhagalpur</option>
                                <option value='Bhandara'>Bhandara</option>
                                <option value='Bharatpur'>Bharatpur</option>
                                <option value='Bharuch'>Bharuch</option>
                                <option value='Bhavnagar'>Bhavnagar</option>
                                <option value='Bhilwara'>Bhilwara</option>
                                <option value='Bhim Nagar'>Bhim Nagar</option>
                                <option value='Bhind'>Bhind</option>
                                <option value='Bhiwani'>Bhiwani</option>
                                <option value='Bhojpur'>Bhojpur</option>
                                <option value='Bhopal'>Bhopal</option>
                                <option value='Bidar'>Bidar</option>
                                <option value='Bijapur'>Bijapur</option>
                                <option value='Bijapur'>Bijapur</option>
                                <option value='Bijnor'>Bijnor</option>
                                <option value='Bikaner'>Bikaner</option>
                                <option value='Bilaspur'>Bilaspur</option>
                                <option value='Bilaspur'>Bilaspur</option>
                                <option value='Birbhum'>Birbhum</option>
                                <option value='Bishnupur'>Bishnupur</option>
                                <option value='Bokaro'>Bokaro</option>
                                <option value='Bongaigaon'>Bongaigaon</option>
                                <option value='Botad'>Botad</option>
                                <option value='Boudh'>Boudh</option>
                                <option value='Budaun'>Budaun</option>
                                <option value='Budgam'>Budgam</option>
                                <option value='Bulandshahr'>Bulandshahr</option>
                                <option value='Buldhana'>Buldhana</option>
                                <option value='Bundi'>Bundi</option>
                                <option value='Burdwan (Bardhaman)'>Burdwan (Bardhaman)</option>
                                <option value='Burhanpur'>Burhanpur</option>
                                <option value='Buxar'>Buxar</option>
                                <option value='Cachar'>Cachar</option>
                                <option value='Central Delhi'>Central Delhi</option>
                                <option value='Chamarajanagar'>Chamarajanagar</option>
                                <option value='Chamba'>Chamba</option>
                                <option value='Chamoli'>Chamoli</option>
                                <option value='Champawat'>Champawat</option>
                                <option value='Champhai'>Champhai</option>
                                <option value='Chandauli'>Chandauli</option>
                                <option value='Chandel'>Chandel</option>
                                <option value='Chandigarh'>Chandigarh</option>
                                <option value='Chandrapur'>Chandrapur</option>
                                <option value='Changlang'>Changlang</option>
                                <option value='Chatra'>Chatra</option>
                                <option value='Chatrapati Sahuji Mahraj Nagar'>Chatrapati Sahuji Mahraj Nagar</option>
                                <option value='Chennai'>Chennai</option>
                                <option value='Chhatarpur'>Chhatarpur</option>
                                <option value='Chhindwara'>Chhindwara</option>
                                <option value='Chhota Udepur'>Chhota Udepur</option>
                                <option value='Chickmagalur'>Chickmagalur</option>
                                <option value='Chikballapur'>Chikballapur</option>
                                <option value='Chirang'>Chirang</option>
                                <option value='Chitradurga'>Chitradurga</option>
                                <option value='Chitrakoot'>Chitrakoot</option>
                                <option value='Chittoor'>Chittoor</option>
                                <option value='Chittorgarh'>Chittorgarh</option>
                                <option value='Churachandpur'>Churachandpur</option>
                                <option value='Churu'>Churu</option>
                                <option value='Coimbatore'>Coimbatore</option>
                                <option value='Cooch Behar'>Cooch Behar</option>
                                <option value='Cuddalore'>Cuddalore</option>
                                <option value='Cuddapah'>Cuddapah</option>
                                <option value='Cuttack'>Cuttack</option>
                                <option value='Dadra & Nagar Haveli'>Dadra & Nagar Haveli</option>
                                <option value='Dahod'>Dahod</option>
                                <option value='Dakshin Dinajpur (South Dinajpur)'>Dakshin Dinajpur (South Dinajpur)</option>
                                <option value='Dakshina Kannada'>Dakshina Kannada</option>
                                <option value='Daman'>Daman</option>
                                <option value='Damoh'>Damoh</option>
                                <option value='Dangs (Ahwa)'>Dangs (Ahwa)</option>
                                <option value='Dantewada (South Bastar)'>Dantewada (South Bastar)</option>
                                <option value='Darbhanga'>Darbhanga</option>
                                <option value='Darjeeling'>Darjeeling</option>
                                <option value='Darrang'>Darrang</option>
                                <option value='Datia'>Datia</option>
                                <option value='Dausa'>Dausa</option>
                                <option value='Davangere'>Davangere</option>
                                <option value='Dehradun'>Dehradun</option>
                                <option value='Deogarh'>Deogarh</option>
                                <option value='Deoghar'>Deoghar</option>
                                <option value='Deoria'>Deoria</option>
                                <option value='Devbhoomi Dwarka'>Devbhoomi Dwarka</option>
                                <option value='Dewas'>Dewas</option>
                                <option value='Dhalai'>Dhalai</option>
                                <option value='Dhamtari'>Dhamtari</option>
                                <option value='Dhanbad'>Dhanbad</option>
                                <option value='Dhar'>Dhar</option>
                                <option value='Dharmapuri'>Dharmapuri</option>
                                <option value='Dharwad'>Dharwad</option>
                                <option value='Dhemaji'>Dhemaji</option>
                                <option value='Dhenkanal'>Dhenkanal</option>
                                <option value='Dholpur'>Dholpur</option>
                                <option value='Dhubri'>Dhubri</option>
                                <option value='Dhule'>Dhule</option>
                                <option value='Dibang Valley'>Dibang Valley</option>
                                <option value='Dibrugarh'>Dibrugarh</option>
                                <option value='Dima Hasao'>Dima Hasao</option>
                                <option value='Dimapur'>Dimapur</option>
                                <option value='Dindigul'>Dindigul</option>
                                <option value='Dindori'>Dindori</option>
                                <option value='Diu'>Diu</option>
                                <option value='Doda'>Doda</option>
                                <option value='Dumka'>Dumka</option>
                                <option value='Dungarpur'>Dungarpur</option>
                                <option value='Durg'>Durg</option>
                                <option value='East Champaran (Motihari)'>East Champaran (Motihari)</option>
                                <option value='East Delhi'>East Delhi</option>
                                <option value='East Garo Hills'>East Garo Hills</option>
                                <option value='East Godavari'>East Godavari</option>
                                <option value='East Jaintia Hills'>East Jaintia Hills</option>
                                <option value='East Kameng'>East Kameng</option>
                                <option value='East Khasi Hills'>East Khasi Hills</option>
                                <option value='East Siang'>East Siang</option>
                                <option value='East Sikkim'>East Sikkim</option>
                                <option value='East Singhbhum'>East Singhbhum</option>
                                <option value='Ernakulam'>Ernakulam</option>
                                <option value='Erode'>Erode</option>
                                <option value='Etah'>Etah</option>
                                <option value='Etawah'>Etawah</option>
                                <option value='Faizabad'>Faizabad</option>
                                <option value='Faridabad'>Faridabad</option>
                                <option value='Faridkot'>Faridkot</option>
                                <option value='Farrukhabad'>Farrukhabad</option>
                                <option value='Fatehabad'>Fatehabad</option>
                                <option value='Fatehgarh Sahib'>Fatehgarh Sahib</option>
                                <option value='Fatehpur'>Fatehpur</option>
                                <option value='Fazilka'>Fazilka</option>
                                <option value='Ferozepur'>Ferozepur</option>
                                <option value='Firozabad'>Firozabad</option>
                                <option value='Gadag'>Gadag</option>
                                <option value='Gadchiroli'>Gadchiroli</option>
                                <option value='Gajapati'>Gajapati</option>
                                <option value='Ganderbal'>Ganderbal</option>
                                <option value='Gandhinagar'>Gandhinagar</option>
                                <option value='Ganjam'>Ganjam</option>
                                <option value='Garhwa'>Garhwa</option>
                                <option value='Gariaband'>Gariaband</option>
                                <option value='Gautam Buddha Nagar'>Gautam Buddha Nagar</option>
                                <option value='Gaya'>Gaya</option>
                                <option value='Ghaziabad'>Ghaziabad</option>
                                <option value='Ghazipur'>Ghazipur</option>
                                <option value='Gir Somnath'>Gir Somnath</option>
                                <option value='Giridih'>Giridih</option>
                                <option value='Goalpara'>Goalpara</option>
                                <option value='Godda'>Godda</option>
                                <option value='Golaghat'>Golaghat</option>
                                <option value='Gomati'>Gomati</option>
                                <option value='Gonda'>Gonda</option>
                                <option value='Gondia'>Gondia</option>
                                <option value='Gopalganj'>Gopalganj</option>
                                <option value='Gorakhpur'>Gorakhpur</option>
                                <option value='Gulbarga'>Gulbarga</option>
                                <option value='Gumla'>Gumla</option>
                                <option value='Guna'>Guna</option>
                                <option value='Guntur'>Guntur</option>
                                <option value='Gurdaspur'>Gurdaspur</option>
                                <option value='Gurgaon'>Gurgaon</option>
                                <option value='Gwalior'>Gwalior</option>
                                <option value='Hailakandi'>Hailakandi</option>
                                <option value='Hamirpur'>Hamirpur</option>
                                <option value='Hamirpur'>Hamirpur</option>
                                <option value='Hanumangarh'>Hanumangarh</option>
                                <option value='Harda'>Harda</option>
                                <option value='Hardoi'>Hardoi</option>
                                <option value='Haridwar'>Haridwar</option>
                                <option value='Hassan'>Hassan</option>
                                <option value='Hathras'>Hathras</option>
                                <option value='Haveri'>Haveri</option>
                                <option value='Hazaribag'>Hazaribag</option>
                                <option value='Hingoli'>Hingoli</option>
                                <option value='Hisar'>Hisar</option>
                                <option value='Hooghly'>Hooghly</option>
                                <option value='Hoshangabad'>Hoshangabad</option>
                                <option value='Hoshiarpur'>Hoshiarpur</option>
                                <option value='Howrah'>Howrah</option>
                                <option value='Hyderabad'>Hyderabad</option>
                                <option value='Idukki'>Idukki</option>
                                <option value='Imphal East'>Imphal East</option>
                                <option value='Imphal West'>Imphal West</option>
                                <option value='Indore'>Indore</option>
                                <option value='Jabalpur'>Jabalpur</option>
                                <option value='Jagatsinghapur'>Jagatsinghapur</option>
                                <option value='Jaipur'>Jaipur</option>
                                <option value='Jaisalmer'>Jaisalmer</option>
                                <option value='Jajpur'>Jajpur</option>
                                <option value='Jalandhar'>Jalandhar</option>
                                <option value='Jalaun'>Jalaun</option>
                                <option value='Jalgaon'>Jalgaon</option>
                                <option value='Jalna'>Jalna</option>
                                <option value='Jalore'>Jalore</option>
                                <option value='Jalpaiguri'>Jalpaiguri</option>
                                <option value='Jammu'>Jammu</option>
                                <option value='Jamnagar'>Jamnagar</option>
                                <option value='Jamtara'>Jamtara</option>
                                <option value='Jamui'>Jamui</option>
                                <option value='Janjgir-Champa'>Janjgir-Champa</option>
                                <option value='Jashpur'>Jashpur</option>
                                <option value='Jaunpur'>Jaunpur</option>
                                <option value='Jehanabad'>Jehanabad</option>
                                <option value='Jhabua'>Jhabua</option>
                                <option value='Jhajjar'>Jhajjar</option>
                                <option value='Jhalawar'>Jhalawar</option>
                                <option value='Jhansi'>Jhansi</option>
                                <option value='Jharsuguda'>Jharsuguda</option>
                                <option value='Jhunjhunu'>Jhunjhunu</option>
                                <option value='Jind'>Jind</option>
                                <option value='Jodhpur'>Jodhpur</option>
                                <option value='Jorhat'>Jorhat</option>
                                <option value='Junagadh'>Junagadh</option>
                                <option value='Jyotiba Phule Nagar (J.P. Nagar)'>Jyotiba Phule Nagar (J.P. Nagar)</option>
                                <option value='Kabirdham (Kawardha)'>Kabirdham (Kawardha)</option>
                                <option value='Kachchh'>Kachchh</option>
                                <option value='Kaimur (Bhabua)'>Kaimur (Bhabua)</option>
                                <option value='Kaithal'>Kaithal</option>
                                <option value='Kalahandi'>Kalahandi</option>
                                <option value='Kamrup Metropolitan'>Kamrup Metropolitan</option>
                                <option value='Kamrup'>Kamrup</option>
                                <option value='Kanchipuram'>Kanchipuram</option>
                                <option value='Kandhamal'>Kandhamal</option>
                                <option value='Kangra'>Kangra</option>
                                <option value='Kanker (North Bastar)'>Kanker (North Bastar)</option>
                                <option value='Kannauj'>Kannauj</option>
                                <option value='Kannur'>Kannur</option>
                                <option value='Kanpur Dehat'>Kanpur Dehat</option>
                                <option value='Kanpur Nagar'>Kanpur Nagar</option>
                                <option value='Kanshiram Nagar (Kasganj)'>Kanshiram Nagar (Kasganj)</option>
                                <option value='Kanyakumari'>Kanyakumari</option>
                                <option value='Kapurthala'>Kapurthala</option>
                                <option value='Karaikal'>Karaikal</option>
                                <option value='Karauli'>Karauli</option>
                                <option value='Karbi Anglong'>Karbi Anglong</option>
                                <option value='Kargil'>Kargil</option>
                                <option value='Karimganj'>Karimganj</option>
                                <option value='Karimnagar'>Karimnagar</option>
                                <option value='Karnal'>Karnal</option>
                                <option value='Karur'>Karur</option>
                                <option value='Kasaragod'>Kasaragod</option>
                                <option value='Kathua'>Kathua</option>
                                <option value='Katihar'>Katihar</option>
                                <option value='Katni'>Katni</option>
                                <option value='Kaushambi'>Kaushambi</option>
                                <option value='Kendrapara'>Kendrapara</option>
                                <option value='Kendujhar (Keonjhar)'>Kendujhar (Keonjhar)</option>
                                <option value='Khagaria'>Khagaria</option>
                                <option value='Khammam'>Khammam</option>
                                <option value='Khandwa'>Khandwa</option>
                                <option value='Khargone'>Khargone</option>
                                <option value='Kheda (Nadiad)'>Kheda (Nadiad)</option>
                                <option value='Khordha'>Khordha</option>
                                <option value='Khowai'>Khowai</option>
                                <option value='Khunti'>Khunti</option>
                                <option value='Kinnaur'>Kinnaur</option>
                                <option value='Kiphire'>Kiphire</option>
                                <option value='Kishanganj'>Kishanganj</option>
                                <option value='Kishtwar'>Kishtwar</option>
                                <option value='Kodagu'>Kodagu</option>
                                <option value='Koderma'>Koderma</option>
                                <option value='Kohima'>Kohima</option>
                                <option value='Kokrajhar'>Kokrajhar</option>
                                <option value='Kolar'>Kolar</option>
                                <option value='Kolasib'>Kolasib</option>
                                <option value='Kolhapur'>Kolhapur</option>
                                <option value='Kolkata'>Kolkata</option>
                                <option value='Kollam'>Kollam</option>
                                <option value='Kondagaon'>Kondagaon</option>
                                <option value='Koppal'>Koppal</option>
                                <option value='Koraput'>Koraput</option>
                                <option value='Korba'>Korba</option>
                                <option value='Korea (Koriya)'>Korea (Koriya)</option>
                                <option value='Kota'>Kota</option>
                                <option value='Kottayam'>Kottayam</option>
                                <option value='Kozhikode'>Kozhikode</option>
                                <option value='Krishna'>Krishna</option>
                                <option value='Krishnagiri'>Krishnagiri</option>
                                <option value='Kulgam'>Kulgam</option>
                                <option value='Kullu'>Kullu</option>
                                <option value='Kupwara'>Kupwara</option>
                                <option value='Kurnool'>Kurnool</option>
                                <option value='Kurukshetra'>Kurukshetra</option>
                                <option value='Kurung Kumey'>Kurung Kumey</option>
                                <option value='Kushinagar (Padrauna)'>Kushinagar (Padrauna)</option>
                                <option value='Lahaul & Spiti'>Lahaul & Spiti</option>
                                <option value='Lakhimpur - Kheri'>Lakhimpur - Kheri</option>
                                <option value='Lakhimpur'>Lakhimpur</option>
                                <option value='Lakhisarai'>Lakhisarai</option>
                                <option value='Lakshadweep'>Lakshadweep</option>
                                <option value='Lalitpur'>Lalitpur</option>
                                <option value='Latehar'>Latehar</option>
                                <option value='Latur'>Latur</option>
                                <option value='Lawngtlai'>Lawngtlai</option>
                                <option value='Leh'>Leh</option>
                                <option value='Lohardaga'>Lohardaga</option>
                                <option value='Lohit'>Lohit</option>
                                <option value='Longding'>Longding</option>
                                <option value='Longleng'>Longleng</option>
                                <option value='Lower Dibang Valley'>Lower Dibang Valley</option>
                                <option value='Lower Subansiri'>Lower Subansiri</option>
                                <option value='Lucknow'>Lucknow</option>
                                <option value='Ludhiana'>Ludhiana</option>
                                <option value='Lunglei'>Lunglei</option>
                                <option value='Madhepura'>Madhepura</option>
                                <option value='Madhubani'>Madhubani</option>
                                <option value='Madurai'>Madurai</option>
                                <option value='Mahabubnagar'>Mahabubnagar</option>
                                <option value='Maharajganj'>Maharajganj</option>
                                <option value='Mahasamund'>Mahasamund</option>
                                <option value='Mahe'>Mahe</option>
                                <option value='Mahendragarh'>Mahendragarh</option>
                                <option value='Mahisagar'>Mahisagar</option>
                                <option value='Mahoba'>Mahoba</option>
                                <option value='Mainpuri'>Mainpuri</option>
                                <option value='Malappuram'>Malappuram</option>
                                <option value='Malda'>Malda</option>
                                <option value='Malkangiri'>Malkangiri</option>
                                <option value='Mamit'>Mamit</option>
                                <option value='Mandi'>Mandi</option>
                                <option value='Mandla'>Mandla</option>
                                <option value='Mandsaur'>Mandsaur</option>
                                <option value='Mandya'>Mandya</option>
                                <option value='Mansa'>Mansa</option>
                                <option value='Mathura'>Mathura</option>
                                <option value='Mau'>Mau</option>
                                <option value='Mayurbhanj'>Mayurbhanj</option>
                                <option value='Medak'>Medak</option>
                                <option value='Meerut'>Meerut</option>
                                <option value='Mehsana'>Mehsana</option>
                                <option value='Mewat'>Mewat</option>
                                <option value='Mirzapur'>Mirzapur</option>
                                <option value='Moga'>Moga</option>
                                <option value='Mokokchung'>Mokokchung</option>
                                <option value='Mon'>Mon</option>
                                <option value='Moradabad'>Moradabad</option>
                                <option value='Morbi'>Morbi</option>
                                <option value='Morena'>Morena</option>
                                <option value='Morigaon'>Morigaon</option>
                                <option value='Muktsar'>Muktsar</option>
                                <option value='Mumbai City'>Mumbai City</option>
                                <option value='Mumbai Suburban'>Mumbai Suburban</option>
                                <option value='Mungeli'>Mungeli</option>
                                <option value='Munger (Monghyr)'>Munger (Monghyr)</option>
                                <option value='Murshidabad'>Murshidabad</option>
                                <option value='Muzaffarnagar'>Muzaffarnagar</option>
                                <option value='Muzaffarpur'>Muzaffarpur</option>
                                <option value='Mysore'>Mysore</option>
                                <option value='Nabarangpur'>Nabarangpur</option>
                                <option value='Nadia'>Nadia</option>
                                <option value='Nagaon'>Nagaon</option>
                                <option value='Nagapattinam'>Nagapattinam</option>
                                <option value='Nagaur'>Nagaur</option>
                                <option value='Nagpur'>Nagpur</option>
                                <option value='Nainital'>Nainital</option>
                                <option value='Nalanda'>Nalanda</option>
                                <option value='Nalbari'>Nalbari</option>
                                <option value='Nalgonda'>Nalgonda</option>
                                <option value='Namakkal'>Namakkal</option>
                                <option value='Nanded'>Nanded</option>
                                <option value='Nandurbar'>Nandurbar</option>
                                <option value='Narayanpur'>Narayanpur</option>
                                <option value='Narmada (Rajpipla)'>Narmada (Rajpipla)</option>
                                <option value='Narsinghpur'>Narsinghpur</option>
                                <option value='Nashik'>Nashik</option>
                                <option value='Navsari'>Navsari</option>
                                <option value='Nawada'>Nawada</option>
                                <option value='Nawanshahr'>Nawanshahr</option>
                                <option value='Nayagarh'>Nayagarh</option>
                                <option value='Neemuch'>Neemuch</option>
                                <option value='Nellore'>Nellore</option>
                                <option value='New Delhi'>New Delhi</option>
                                <option value='Nicobar'>Nicobar</option>
                                <option value='Nilgiris'>Nilgiris</option>
                                <option value='Nizamabad'>Nizamabad</option>
                                <option value='North 24 Parganas'>North 24 Parganas</option>
                                <option value='North and Middle Andaman'>North and Middle Andaman</option>
                                <option value='North Delhi'>North Delhi</option>
                                <option value='North East Delhi'>North East Delhi</option>
                                <option value='North Garo Hills'>North Garo Hills</option>
                                <option value='North Goa'>North Goa</option>
                                <option value='North Sikkim'>North Sikkim</option>
                                <option value='North Tripura'>North Tripura</option>
                                <option value='North West Delhi'>North West Delhi</option>
                                <option value='Nuapada'>Nuapada</option>
                                <option value='Osmanabad'>Osmanabad</option>
                                <option value='Pakur'>Pakur</option>
                                <option value='Palakkad'>Palakkad</option>
                                <option value='Palamu'>Palamu</option>
                                <option value='Pali'>Pali</option>
                                <option value='Palwal'>Palwal</option>
                                <option value='Panchkula'>Panchkula</option>
                                <option value='Panchmahal (Godhra)'>Panchmahal (Godhra)</option>
                                <option value='Panchsheel Nagar'>Panchsheel Nagar</option>
                                <option value='Panipat'>Panipat</option>
                                <option value='Panna'>Panna</option>
                                <option value='Papum Pare'>Papum Pare</option>
                                <option value='Parbhani'>Parbhani</option>
                                <option value='Paschim Medinipur (West Medinipur)'>Paschim Medinipur (West Medinipur)</option>
                                <option value='Patan'>Patan</option>
                                <option value='Pathanamthitta'>Pathanamthitta</option>
                                <option value='Pathankot'>Pathankot</option>
                                <option value='Patiala'>Patiala</option>
                                <option value='Patna'>Patna</option>
                                <option value='Pauri Garhwal'>Pauri Garhwal</option>
                                <option value='Perambalur'>Perambalur</option>
                                <option value='Peren'>Peren</option>
                                <option value='Phek'>Phek</option>
                                <option value='Pilibhit'>Pilibhit</option>
                                <option value='Pithoragarh'>Pithoragarh</option>
                                <option value='Pondicherry'>Pondicherry</option>
                                <option value='Poonch'>Poonch</option>
                                <option value='Porbandar'>Porbandar</option>
                                <option value='Prabuddh Nagar'>Prabuddh Nagar</option>
                                <option value='Prakasam'>Prakasam</option>
                                <option value='Pratapgarh'>Pratapgarh</option>
                                <option value='Pratapgarh'>Pratapgarh</option>
                                <option value='Pudukkottai'>Pudukkottai</option>
                                <option value='Pulwama'>Pulwama</option>
                                <option value='Pune'>Pune</option>
                                <option value='Purba Medinipur (East Medinipur)'>Purba Medinipur (East Medinipur)</option>
                                <option value='Puri'>Puri</option>
                                <option value='Purnia (Purnea)'>Purnia (Purnea)</option>
                                <option value='Purulia'>Purulia</option>
                                <option value='RaeBareli'>RaeBareli</option>
                                <option value='Raichur'>Raichur</option>
                                <option value='Raigad'>Raigad</option>
                                <option value='Raigarh'>Raigarh</option>
                                <option value='Raipur'>Raipur</option>
                                <option value='Raisen'>Raisen</option>
                                <option value='Rajgarh'>Rajgarh</option>
                                <option value='Rajkot'>Rajkot</option>
                                <option value='Rajnandgaon'>Rajnandgaon</option>
                                <option value='Rajouri'>Rajouri</option>
                                <option value='Rajsamand'>Rajsamand</option>
                                <option value='Ramanathapuram'>Ramanathapuram</option>
                                <option value='Ramban'>Ramban</option>
                                <option value='Ramgarh'>Ramgarh</option>
                                <option value='Ramnagara'>Ramnagara</option>
                                <option value='Rampur'>Rampur</option>
                                <option value='Ranchi'>Ranchi</option>
                                <option value='Rangareddy'>Rangareddy</option>
                                <option value='Ratlam'>Ratlam</option>
                                <option value='Ratnagiri'>Ratnagiri</option>
                                <option value='Rayagada'>Rayagada</option>
                                <option value='Reasi'>Reasi</option>
                                <option value='Rewa'>Rewa</option>
                                <option value='Rewari'>Rewari</option>
                                <option value='Ri Bhoi'>Ri Bhoi</option>
                                <option value='Rohtak'>Rohtak</option>
                                <option value='Rohtas'>Rohtas</option>
                                <option value='Rudraprayag'>Rudraprayag</option>
                                <option value='Rupnagar'>Rupnagar</option>
                                <option value='Sabarkantha (Himmatnagar)'>Sabarkantha (Himmatnagar)</option>
                                <option value='Sagar'>Sagar</option>
                                <option value='Saharanpur'>Saharanpur</option>
                                <option value='Saharsa'>Saharsa</option>
                                <option value='Sahibganj'>Sahibganj</option>
                                <option value='Saiha'>Saiha</option>
                                <option value='Salem'>Salem</option>
                                <option value='Samastipur'>Samastipur</option>
                                <option value='Samba'>Samba</option>
                                <option value='Sambalpur'>Sambalpur</option>
                                <option value='Sangli'>Sangli</option>
                                <option value='Sangrur'>Sangrur</option>
                                <option value='Sant Kabir Nagar'>Sant Kabir Nagar</option>
                                <option value='Sant Ravidas Nagar'>Sant Ravidas Nagar</option>
                                <option value='Saran'>Saran</option>
                                <option value='SAS Nagar (Mohali)'>SAS Nagar (Mohali)</option>
                                <option value='Satara'>Satara</option>
                                <option value='Satna'>Satna</option>
                                <option value='Sawai Madhopur'>Sawai Madhopur</option>
                                <option value='Sehore'>Sehore</option>
                                <option value='Senapati'>Senapati</option>
                                <option value='Seoni'>Seoni</option>
                                <option value='Sepahijala'>Sepahijala</option>
                                <option value='Seraikela-Kharsawan'>Seraikela-Kharsawan</option>
                                <option value='Serchhip'>Serchhip</option>
                                <option value='Shahdol'>Shahdol</option>
                                <option value='Shahjahanpur'>Shahjahanpur</option>
                                <option value='Shajapur'>Shajapur</option>
                                <option value='Sheikhpura'>Sheikhpura</option>
                                <option value='Sheohar'>Sheohar</option>
                                <option value='Sheopur'>Sheopur</option>
                                <option value='Shimla'>Shimla</option>
                                <option value='Shimoga'>Shimoga</option>
                                <option value='Shivpuri'>Shivpuri</option>
                                <option value='Shopian'>Shopian</option>
                                <option value='Shravasti'>Shravasti</option>
                                <option value='Siddharth Nagar'>Siddharth Nagar</option>
                                <option value='Sidhi'>Sidhi</option>
                                <option value='Sikar'>Sikar</option>
                                <option value='Simdega'>Simdega</option>
                                <option value='Sindhudurg'>Sindhudurg</option>
                                <option value='Singrauli'>Singrauli</option>
                                <option value='Sirmaur (Sirmour)'>Sirmaur (Sirmour)</option>
                                <option value='Sirohi'>Sirohi</option>
                                <option value='Sirsa'>Sirsa</option>
                                <option value='Sitamarhi'>Sitamarhi</option>
                                <option value='Sitapur'>Sitapur</option>
                                <option value='Sivaganga'>Sivaganga</option>
                                <option value='Sivasagar'>Sivasagar</option>
                                <option value='Siwan'>Siwan</option>
                                <option value='Solan'>Solan</option>
                                <option value='Solapur'>Solapur</option>
                                <option value='Sonbhadra'>Sonbhadra</option>
                                <option value='Sonepur'>Sonepur</option>
                                <option value='Sonipat'>Sonipat</option>
                                <option value='Sonitpur'>Sonitpur</option>
                                <option value='South 24 Parganas'>South 24 Parganas</option>
                                <option value='South Andaman'>South Andaman</option>
                                <option value='South Delhi'>South Delhi</option>
                                <option value='South Garo Hills'>South Garo Hills</option>
                                <option value='South Goa'>South Goa</option>
                                <option value='South Sikkim'>South Sikkim</option>
                                <option value='South Tripura'>South Tripura</option>
                                <option value='South West Delhi'>South West Delhi</option>
                                <option value='South West Garo Hills'>South West Garo Hills</option>
                                <option value='South West Khasi Hills'>South West Khasi Hills</option>
                                <option value='Sri Ganganagar'>Sri Ganganagar</option>
                                <option value='Srikakulam'>Srikakulam</option>
                                <option value='Srinagar'>Srinagar</option>
                                <option value='Sukma'>Sukma</option>
                                <option value='Sultanpur'>Sultanpur</option>
                                <option value='Sundargarh'>Sundargarh</option>
                                <option value='Supaul'>Supaul</option>
                                <option value='Surajpur'>Surajpur</option>
                                <option value='Surat'>Surat</option>
                                <option value='Surendranagar'>Surendranagar</option>
                                <option value='Surguja'>Surguja</option>
                                <option value='Tamenglong'>Tamenglong</option>
                                <option value='Tapi (Vyara)'>Tapi (Vyara)</option>
                                <option value='Tarn Taran'>Tarn Taran</option>
                                <option value='Tawang'>Tawang</option>
                                <option value='Tehri Garhwal'>Tehri Garhwal</option>
                                <option value='Thane'>Thane</option>
                                <option value='Thanjavur'>Thanjavur</option>
                                <option value='Theni'>Theni</option>
                                <option value='Thiruvananthapuram'>Thiruvananthapuram</option>
                                <option value='Thoothukudi (Tuticorin)'>Thoothukudi (Tuticorin)</option>
                                <option value='Thoubal'>Thoubal</option>
                                <option value='Thrissur'>Thrissur</option>
                                <option value='Tikamgarh'>Tikamgarh</option>
                                <option value='Tinsukia'>Tinsukia</option>
                                <option value='Tirap'>Tirap</option>
                                <option value='Tiruchirappalli'>Tiruchirappalli</option>
                                <option value='Tirunelveli'>Tirunelveli</option>
                                <option value='Tiruppur'>Tiruppur</option>
                                <option value='Tiruvallur'>Tiruvallur</option>
                                <option value='Tiruvannamalai'>Tiruvannamalai</option>
                                <option value='Tiruvarur'>Tiruvarur</option>
                                <option value='Tonk'>Tonk</option>
                                <option value='Tuensang'>Tuensang</option>
                                <option value='Tumkur'>Tumkur</option>
                                <option value='Udaipur'>Udaipur</option>
                                <option value='Udalguri'>Udalguri</option>
                                <option value='Udham Singh Nagar'>Udham Singh Nagar</option>
                                <option value='Udhampur'>Udhampur</option>
                                <option value='Udupi'>Udupi</option>
                                <option value='Ujjain'>Ujjain</option>
                                <option value='Ukhrul'>Ukhrul</option>
                                <option value='Umaria'>Umaria</option>
                                <option value='Una'>Una</option>
                                <option value='Unakoti'>Unakoti</option>
                                <option value='Unnao'>Unnao</option>
                                <option value='Upper Siang'>Upper Siang</option>
                                <option value='Upper Subansiri'>Upper Subansiri</option>
                                <option value='Uttar Dinajpur (North Dinajpur)'>Uttar Dinajpur (North Dinajpur)</option>
                                <option value='Uttara Kannada (Karwar)'>Uttara Kannada (Karwar)</option>
                                <option value='Uttarkashi'>Uttarkashi</option>
                                <option value='Vadodara'>Vadodara</option>
                                <option value='Vaishali'>Vaishali</option>
                                <option value='Valsad'>Valsad</option>
                                <option value='Varanasi'>Varanasi</option>
                                <option value='Vellore'>Vellore</option>
                                <option value='Vidisha'>Vidisha</option>
                                <option value='Viluppuram'>Viluppuram</option>
                                <option value='Virudhunagar'>Virudhunagar</option>
                                <option value='Visakhapatnam'>Visakhapatnam</option>
                                <option value='Vizianagaram'>Vizianagaram</option>
                                <option value='Warangal'>Warangal</option>
                                <option value='Wardha'>Wardha</option>
                                <option value='Washim'>Washim</option>
                                <option value='Wayanad'>Wayanad</option>
                                <option value='West Champaran'>West Champaran</option>
                                <option value='West Delhi'>West Delhi</option>
                                <option value='West Garo Hills'>West Garo Hills</option>
                                <option value='West Godavari'>West Godavari</option>
                                <option value='West Jaintia Hills'>West Jaintia Hills</option>
                                <option value='West Kameng'>West Kameng</option>
                                <option value='West Khasi Hills'>West Khasi Hills</option>
                                <option value='West Siang'>West Siang</option>
                                <option value='West Sikkim'>West Sikkim</option>
                                <option value='West Singhbhum'>West Singhbhum</option>
                                <option value='West Tripura'>West Tripura</option>
                                <option value='Wokha'>Wokha</option>
                                <option value='Yadgir'>Yadgir</option>
                                <option value='Yamunanagar'>Yamunanagar</option>
                                <option value='Yanam'>Yanam</option>
                                <option value='Yavatmal'>Yavatmal</option>
                                <option value='Zunheboto'>Zunheboto</option>
                                <option value="<?php echo $row['city'] ?>" selected>Selected:<?php echo $row['city'] ?></option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputpin" class="col-sm-5 col-form-label"><b>Pin Code : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required name="pin" value="<?php echo $row['pin'] ?>" title="Please Enter a Valid Pin Code." pattern="^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputpin">
                        </div>
                    </div>
                    <br>
                    <h3><b><u>Parent's Details</u></b></h3>
                    <br>
                    <?php if ($row['fimg']) { ?>
                        <div class="form-group">
                            <div class="thumbnail">
                                <?php echo "<img src='../../Student/upload/" . $row['fimg'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
                            </div>
                        </div>
                        <br>
                    <?php } ?>
                    <div class="form-group row">
                        <label for="inputfname" class="col-sm-5 col-form-label"><b>Father Name : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="fname" id="inputfname" value="<?php echo $row['fname'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputfimg" class="col-sm-5 col-form-label"><b>Father Image : </b></label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="fimg" id="inputfimg" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputfaddress" class="col-sm-5 col-form-label"><b>Father Office Address : </b></label>
                        <div class="col-sm-5">
                            <textarea rows="3" cols="40" class="form-control" name="foffice" id="inputfaddress"><?php echo $row['foffice'] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputfphone" class="col-sm-5 col-form-label"><b>Father Mobile Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="fphone" value="<?php echo $row['fphone'] ?>" title="Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputfphone">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputfmail" class="col-sm-5 col-form-label"><b>Father Email : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="fmail" value="<?php echo $row['fmail'] ?>" title="please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputfmail">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputfinc" class="col-sm-5 col-form-label"><b>Father Annual Income : </b></label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="finc" id="inputfinc" value="<?php echo $row['finc'] ?>">
                        </div>
                    </div>
                    <br>
                    <?php if ($row['mimg']) { ?>
                        <div class="form-group">
                            <div class="thumbnail">
                                <?php echo "<img src='../../Student/upload/" . $row['mimg'] . "' class='img-thumbnail' style='width:20%' alt='Student' >"; ?>
                            </div>
                        </div>
                        <br>
                    <?php } ?>
                    <div class="form-group row">
                        <label for="inputmname" class="col-sm-5 col-form-label"><b>Mother Name : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="mname" id="inputmname" value="<?php echo $row['mname'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputmimg" class="col-sm-5 col-form-label"><b>Mother Image : </b></label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="mimg" id="inputmimg" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputmaddress" class="col-sm-5 col-form-label"><b>Mother Office Address : </b></label>
                        <div class="col-sm-5">
                            <textarea rows="3" cols="40" class="form-control" name="moffice" id="inputmaddress"><?php echo $row['moffice'] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputmphone" class="col-sm-5 col-form-label"><b>Mother Mobile Number : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="mphone" value="<?php echo $row['mphone'] ?>" title="Please enter a valid Phone Number." pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputmphone">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputmmail" class="col-sm-5 col-form-label"><b>Mother Email : </b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="mmail" value="<?php echo $row['mmail'] ?>" title="please enter a valid email address" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" id="inputmmail">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputminc" class="col-sm-5 col-form-label"><b>Mother Annual Income : </b></label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="minc" id="inputminc" value="<?php echo $row['minc'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary" name="edit" type="submit">Submit</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-secondary" name="cancel" type="submit">Cancel</button>
                        </div>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </center>
    </main>
<?php }
include("../extra/footer.php"); ?>