<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {


	public function getDistrictDetails() {
		$sql  = "SELECT * FROM district_master";
		
        $qry2 =  $this->db->query($sql);
		print_r($qry2);
		
	}

	public function UpdateOldDetails($applId,$path_plotRegistryCopy,$Nameofapplicant,$FatherHusbandname,$Category,$SubCaste,$AppliedSchemeBefore,$OccupationOfApplicant,$AnnualFamilyIncome,$PermanentAddress,$District,$Area,$TehsilMunicipal,$PinCode,$BankName,$IFSCCode,$AccountNo,$BankBranch,$AccountHolderName,$BPLCard,$path_CasteCertificate,$path_AadhaarCopy,$path_ProofofHaryanaResidence,$path_AadhaarLinkedBankAccountCopy,$FamilyID,$MemberID,$Kiosk_Details,$Payment_Details,$PaymentMode,$TotalAmount,$Application_ID,$Application_Ref_No,$Application_Submission_Mode,$DistrictName,$Caste_Category,$Family_Annual_Income,$currentDate,$MentionConstruction,$CurrentAddress,$CDistrict,$CArea,$CTehsilMuniciple,$CPostOffice,$CPinCode,$DistrictCode,$ServiceCode,$Gender)
	{
		$qry2 = "UPDATE tbl_navinikaran_yojana SET `plotRegistryCopy`= '$path_plotRegistryCopy', `Nameofapplicant` = '$Nameofapplicant', `FatherHusbandname` = '$FatherHusbandname', `Category` = '$Category', `SubCaste` = '$SubCaste', `AppliedSchemeBefore` = '$AppliedSchemeBefore', `OccupationOfApplicant` = '$OccupationOfApplicant', `AnnualFamilyIncome` = '$AnnualFamilyIncome', `PermanentAddress` = '$PermanentAddress', `District` = '$District', `Area` = '$Area', `TehsilMunicipal` = '$TehsilMunicipal', `PinCode` = '$PinCode',`CurrentAddress` = '$CurrentAddress', `CDistrict` = '$CDistrict', `CArea` = '$CArea', `CTehsilMuniciple` = '$CTehsilMuniciple', `CPostOffice` = '$CPostOffice', `CPinCode` = '$CPinCode', `BankName` = '$BankName', `IFSCCode` = '$IFSCCode', `AccountNo` = '$AccountNo', `BankBranch` = '$BankBranch', `AccountHolderName` = '$AccountHolderName', `BPLCard` = '$BPLCard', `CasteCertificate` = '$path_CasteCertificate', `AadhaarCopy` = '$path_AadhaarCopy', `ProofofHaryanaResidence` = '$path_ProofofHaryanaResidence', `AadhaarLinkedBankAccountCopy` = '$path_AadhaarLinkedBankAccountCopy', `familyID` = '$FamilyID', `memberID` = '$MemberID', `Payment_Details` = '$Payment_Details', `PaymentMode` = '$PaymentMode', `TotalAmount` = '$TotalAmount', `Application_ID` = '$Application_ID', `Application_Submission_Mode` = '$Application_Submission_Mode', `ServiceCode` = '$ServiceCode', `Caste_Category` = '$Caste_Category', `Family_Annual_Income` = '$Family_Annual_Income', `Gender` = '$Gender', `DistrictCode` = '$DistrictCode', `DistrictName` = '$DistrictName', `Kiosk_Details` = '$Kiosk_Details' WHERE Application_Ref_No= '$Application_Ref_No'"; 
		$q1234 = $this->db->query($qry2);		
		if($q1234){
			return TRUE;
        } else {
            return FALSE;			
        }
	}

	public function StatusUpdate()
	{
		$qry2 = "UPDATE member_schemes SET `all_status`= '6', `dwo_approve_date` = '0000-00-00 00:00:00', `dwo_approve_api_response` = null WHERE mem_id='72' AND user_id='26' AND schemeID='4' AND cand_id='380'";
		$q1234 = $this->db->query($qry2);		
		if($q1234){
			return TRUE;
        } else {
            return FALSE;			
        }
	}	


	public function getSMS()
	{
		$qry = "SELECT id,`MobileNumber`,`application_ref_no`  FROM `medhavi_chhatra` mc INNER JOIN `member_schemes` ms ON ms.`cand_id`=mc.id 
WHERE ms.`schemeID`='4' AND ms.`all_status`='8' AND ms.`sent_sms_status`='0'";
        $q1234 = $this->db->query($qry);	 
        if($q1234->num_rows() != ''){
			return $q1234->result_array();
        } else {
            return FALSE;			
        }
	}

	public function updateSMS($id)
	{
		$qry2 = "UPDATE member_schemes SET `sent_sms_status`= '1' WHERE schemeID='4' AND cand_id='$id'";
		$q1234 = $this->db->query($qry2);		
		if($q1234){
			return TRUE;
        } else {
            return FALSE;			
        }
	}

	public function navinikaran_smsCheck()
	{
		$qry2 = "SELECT `id`,`Application_Ref_No`,`Mobile`,sent_sms_status FROM `tbl_navinikaran_yojana` tny INNER JOIN `member_schemes` ms ON ms.`cand_id`=tny.id 
        WHERE ms.`schemeID`='2' AND ms.`all_status`='8' AND ms.`sent_sms_status`='0'";
        $q1234 = $this->db->query($qry2);	 
        if($q1234->num_rows() != ''){
			return $q1234->result_array();
        } else {
            return FALSE;			
        }
	}

	public function navinikaranupdateSMS($id)
	{
		$qry2 = "UPDATE member_schemes SET `sent_sms_status`= '1' WHERE schemeID='2' AND cand_id='$id'";
		$q1234 = $this->db->query($qry2);		
		if($q1234){
			return TRUE;
        } else {
            return FALSE;			
        }
	}


	// public function addMedhaviChhatra($data,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIncomeCertificate,$path_CopyofIdCard,$ApplicantName,$DateofBirth,$MobileNumber,$SubCaste,$Category,$ApplicantFatherHusbandName,$PermanentAddress,$District,$Area,$BlockMunicipal,$VillageSector,$PostOffice,$PinCode,$NameoftheInstutute,$YearofPassingExam,$PreviousCourseTradeAttended,$Rollno,$MarksObtained,$Marks,$YearofAdmission,$UrbanRural,$PresentCourseTradeAttending,$Grades,$BankName,$IFSCCode,$AccountNo,$BankBranch,$familyid,$memberid,$familyIncome,$extra1,$extra2,$extra3,$extra4,$extra5,$extra6,$extra7,$extra8,$extra9,$currentDate,$Haryana_residence_certificate) {

    //     $saral_rg_no =  NULL;
    //     $ApplicantName =  $ApplicantName;
    //     $Applicantphoto =  $path_Applicantphoto;
    //     $Father_HusbandName =  $ApplicantFatherHusbandName; 
    //     $DOB =  $DateofBirth; 
    //     $Gender =  $data['Gender'];
    //     $Category_id =  $Category;
    //     $Subcategory_id  = $SubCaste;
    //     $FamilyID =  $data['familyid'];
    //     $Memberid =  $data['memberid'];
    //     $MobileNumber =  $MobileNumber;
    //     $Permanentaddressofapplicant =  $PermanentAddress;
    //     $District_id =  $District;
    //     $Area =  $Area;
    //     $blockmuncipal =  $BlockMunicipal;
    //     $VillageSector =  $VillageSector;
    //     $Postoffice =  $PostOffice;
    //     $Tehsil_Municipal_id =  NULL;
    //     $Village_Sector_id =  NULL;
    //     $Pincode =  $PinCode;
    //     $NameoftheInstitute =  $NameoftheInstutute;
    //     $yearofpassingexam =  $YearofPassingExam;
    //     $Previouscourse_TradeAttended =  $PreviousCourseTradeAttended;
    //     $RollNo =  $Rollno;
    //     $MarksObtained =  $MarksObtained;
    //     $Marks =  $Marks;
    //     $Marks_percentage =  NULL;
    //     $YearofAdmission =  $YearofAdmission;
    //     $Urban_Rural =  $UrbanRural;        
    //     $PresentCourse_TradeAttending =  $PresentCourseTradeAttending;
    //     $GradesGPA =  $Grades;              
    //     $BankName =  $BankName;
    //     $IFSCCode =  $IFSCCode;
    //     $AccountNo =  $AccountNo;       
    //     $AccountHolderName =  $AccountHolderName; 
    //     $CasteCertificate =  $path_CasteCertificate;
    //     $Marksheetscholarshipclaimed =  $path_Marksheetscholarshipclaimed;
    //     $CopyofBankAccountNo =  $path_CopyofBankAccountNo;
    //     $CopyofIdCard =  $path_CopyofIdCard;
    //     $CopyofIncomeCertificate =  $path_CopyofIncomeCertificate;
    //     $BankBranch =  $BankBranch;
    //     $familyIncome =  $familyIncome;
    //     $E_mail =  NULL;
    //     $applId =  $data['spId']['applId'];
    //     $application_submission_mode = $extra1;
    //     $application_ref_no = $extra2;
    //     $total_amount = $extra3;
    //     $payment_mode = $extra4;
    //     $payment_details = $extra5;
    //     $kiosk_details = $extra6;
    //     $kiosk_name = $extra7;
    //     $kiosk_registration_no = $extra8;
    //     $service_version = $extra9;   

    //     $qry1 = "SELECT * FROM medhavi_chhatra WHERE Memberid = '$Memberid'";
    //     $qry2 =  $this->db->query($qry1);
    //     if ($qry2->result_id->num_rows > 0) {

    //        return false;
    //     } else {  

    //         $qr = "INSERT INTO `medhavi_chhatra` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate')";

    //         $query1 =  $this->db->query($qr);

    //         if($query1) {

    //             $inserted_id = $this->db->insert_id();
    //             $schmId = '4';
    //             $status = '1';
    //             $qr11 = "INSERT INTO `member_schemes` (`schemeID`,`cand_id`,`all_status`,`sent_dwo_status_date`) VALUES ('$schmId','$inserted_id','$status','$currentDate')";
    //             $qq =  $this->db->query($qr11); 
    //             if($qq){
    //                 return TRUE;
    //             }else{ 
    //                 return FALSE;
    //             }
    //         } else {

    //             return FALSE;
    //         } 
    //     }


	// }



    public function addMedhaviChhatra($data,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIncomeCertificate,$path_CopyofIdCard,$ApplicantName,$DateofBirth,$MobileNumber,$SubCaste,$Category,$ApplicantFatherHusbandName,$PermanentAddress,$District,$Area,$BlockMunicipal,$VillageSector,$PostOffice,$PinCode,$NameoftheInstutute,$YearofPassingExam,$PreviousCourseTradeAttended,$Rollno,$MarksObtained,$Marks,$YearofAdmission,$UrbanRural,$PresentCourseTradeAttending,$Grades,$BankName,$IFSCCode,$AccountNo,$AccountHolderName,$BankBranch,$familyid,$memberid,$familyIncome,$extra1,$extra2,$extra3,$extra4,$extra5,$extra6,$extra7,$extra8,$extra9,$currentDate,$Haryana_residence_certificate,$saralapplicationRegistrationDate,$EMail,$categoryName,$casteCategoryCode,$casteDescription) {

        $saral_rg_no =  NULL;
        $ApplicantName =  $ApplicantName;
        $Applicantphoto =  $path_Applicantphoto;
        $Father_HusbandName =  $ApplicantFatherHusbandName; 
        $DOB =  $DateofBirth; 
        $Gender =  $data['Gender'];
        $Category_id =  $Category;
        $Subcategory_id  = $SubCaste;
        $FamilyID =  $data['familyid'];
        $Memberid =  $data['memberid'];
        $MobileNumber =  $MobileNumber;
        $Permanentaddressofapplicant =  $PermanentAddress;
        $District_id =  $District;
        $Area =  $Area;
        $blockmuncipal =  $BlockMunicipal;
        $VillageSector =  $VillageSector;
        $Postoffice =  $PostOffice;
        $Tehsil_Municipal_id =  NULL;
        $Village_Sector_id =  NULL;
        $Pincode =  $PinCode;
        $NameoftheInstitute =  $NameoftheInstutute;
        $yearofpassingexam =  $YearofPassingExam;
        $Previouscourse_TradeAttended =  $PreviousCourseTradeAttended;
        $RollNo =  $Rollno;
        $MarksObtained =  $MarksObtained;
        $Marks =  $Marks;
        $Marks_percentage =  NULL;
        $YearofAdmission =  $YearofAdmission;
        $Urban_Rural =  $UrbanRural;        
        $PresentCourse_TradeAttending =  $PresentCourseTradeAttending;
        $GradesGPA =  $Grades;              
        $BankName =  $BankName;
        $IFSCCode =  $IFSCCode;
        $AccountNo =  $AccountNo;       
        $AccountHolderName =  $AccountHolderName; 
        $CasteCertificate =  $path_CasteCertificate;
        $Marksheetscholarshipclaimed =  $path_Marksheetscholarshipclaimed;
        $CopyofBankAccountNo =  $path_CopyofBankAccountNo;
        $CopyofIdCard =  $path_CopyofIdCard;
        $CopyofIncomeCertificate =  $path_CopyofIncomeCertificate;
        $BankBranch =  $BankBranch;
        $familyIncome =  $familyIncome;
        $E_mail =  $EMail;
        $applId =  $data['spId']['applId'];
        $application_submission_mode = $extra1;
        $application_ref_no = $extra2;
        $total_amount = $extra3;
        $payment_mode = $extra4;
        $payment_details = $extra5;
        $kiosk_details = $extra6;
        $kiosk_name = $extra7;
        $kiosk_registration_no = $extra8;
        $service_version = $extra9;   
        $saral_appli_Reg_Date = $saralapplicationRegistrationDate;   
           

        
        //Testing family ids for doing test applications in order to launch service
        if($FamilyID == '8MUZ4451' || $FamilyID == '1LDX9182' || $FamilyID == '8muz4451' || $FamilyID == '1ldx9182'){ 

            $qr = "INSERT INTO `medhavi_chhatra_staging` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription')";
    
            $query1 =  $this->db->query($qr);

            if($query1) {
 
                return "duplicate";
            } else {

                return FALSE;
            } 

        }else{ 
            //check if applicationrefno allready present
            $qryChk = "SELECT * FROM  medhavi_chhatra m WHERE application_ref_no = '$application_ref_no'";
            $qryChkResp =  $this->db->query($qryChk);
            if ($qryChkResp->result_id->num_rows > 0) {
                //duplicate
                return "duplicate";
            }else{
                //check if records are present with the incoming memberID
                $qry1 = "SELECT * FROM medhavi_chhatra WHERE Memberid = '$Memberid'";
                $qry2 =  $this->db->query($qry1);

                if ($qry2->result_id->num_rows > 0) {
                    //Check if records present with incoming records are not rejected
                    $select_query1 = "SELECT * FROM medhavi_chhatra mc
                    INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                    WHERE mc.Memberid='$Memberid' AND ms.all_status!='6' AND ms.schemeID='4'";
                    $rec1 = $this->db->query($select_query1);

                    if($rec1->result_id->num_rows > 0){
                        //allow insertion for cases which are not rejected but are applied for fresh class in SC category Only

                        $qryCheckClassSC = "SELECT * FROM medhavi_chhatra mc
                        INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                        WHERE mc.Memberid = '$Memberid' AND ms.all_status !='6' AND ms.schemeID='4' 
                        AND mc.application_ref_no != '$application_ref_no'
                        AND Category_id = '4' AND Previouscourse_TradeAttended < '$Previouscourse_TradeAttended'";
                        $responseCheckClassSC = $this->db->query($qryCheckClassSC);

                        if($responseCheckClassSC->result_id->num_rows > 0){
                            $qr = "INSERT INTO `medhavi_chhatra` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription')";
                                
                            $query1 =  $this->db->query($qr);
                
                            if($query1) {
                
                                $inserted_id = $this->db->insert_id();
                                $schmId = '4';
                                $status = '1';
                                $qr11 = "INSERT INTO `member_schemes_medhavi_chhatra` (`schemeID`,`cand_id`,`all_status`,`sent_dwo_status_date`) VALUES ('$schmId','$inserted_id','$status','$currentDate')";
                                $qq =  $this->db->query($qr11); 
                                if($qq)
                                {
                                    return "applied";
                                }else{
                
                                    return FALSE;
                                }
                            } else {
                
                                return FALSE;
                            }

                        }else{ 

                            $duplicateID = $rec1->result_array()['0']['application_ref_no'];

                            $deactivate_qr = "INSERT INTO `medhavi_chhatra_deactivated_applications` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`,`duplicate_id`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription','$duplicateID')";

                            $deactivate_query1 =  $this->db->query($deactivate_qr);

                            if($deactivate_query1) {

                                return "duplicate";
                            } else {

                                return FALSE;
                            }

                        }

                    }else{
                        //Allowing Rejected cases to be Reapplied
                        $select_query = "SELECT * FROM medhavi_chhatra mc
                        INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                        WHERE mc.Memberid='$Memberid' AND ms.all_status='6' AND mc.application_ref_no != '$application_ref_no' AND ms.schemeID='4'";
                        $rec = $this->db->query($select_query);


                        if($rec->result_id->num_rows > 0){
                            
                            $qr= "INSERT INTO `db_groom`.`medhavi_chhatra_deleted_rejected_applications` (SELECT mc.* FROM medhavi_chhatra mc
                            INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                            WHERE mc.Memberid='$Memberid' AND ms.all_status='6' AND mc.application_ref_no != '$application_ref_no' AND ms.schemeID='4')";
                        
                            $run = $this->db->query($qr);
                            $cand_id1 = "select mc.id from medhavi_chhatra mc
                            INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                            WHERE mc.Memberid='$Memberid' AND ms.all_status='6' AND mc.application_ref_no != '$application_ref_no' AND ms.schemeID='4'";
                            $cand_id2 = $this->db->query($cand_id1);
                            $cand_id = $cand_id2->result_array()[0]['id'];
                        
                            if($cand_id){
                                $qr11 = "INSERT INTO `member_schemes_deleted_rejected_applications` select * from member_schemes_medhavi_chhatra where cand_id='$cand_id' and schemeID='4' AND all_status='6'";
                                $qq =  $this->db->query($qr11);
                                if($qq){
                                    $delete_rejected_ms="DELETE FROM member_schemes_medhavi_chhatra WHERE cand_id='$cand_id' and schemeID='4'";
                                    $delete_status=$this->db->query($delete_rejected_ms);
                                    
                                    if($delete_status){
                                        $delete_rejected_app="DELETE FROM medhavi_chhatra WHERE Memberid='$Memberid' and id = '$cand_id'";
                                        $deleter_status=$this->db->query($delete_rejected_app);

                                        if($deleter_status){

                                            $qr = "INSERT INTO `medhavi_chhatra` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription')";

                                            $query1 =  $this->db->query($qr);

                                            if($query1) {

                                                $inserted_id = $this->db->insert_id();
                                                $schmId = '4';
                                                $status = '1';
                                                $qr11 = "INSERT INTO `member_schemes_medhavi_chhatra` (`schemeID`,`cand_id`,`all_status`,`sent_dwo_status_date`) VALUES ('$schmId','$inserted_id','$status','$currentDate')";
                                                $qq =  $this->db->query($qr11); 
                                                if($qq)
                                                {
                                                    return "applied";
                                                }else{

                                                    return FALSE;
                                                }
                                            } else {

                                                return FALSE;
                                            }
                                        }
                                    }
                                        
                                }else{

                                            return FALSE;

                                }
                            }
                        
                                
                        }else {

                            $duplicateID = $qry2->result_array()['0']['application_ref_no'];

                            $deactivate_qr = "INSERT INTO `medhavi_chhatra_deactivated_applications` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`,`duplicate_id`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription','$duplicateID')";

                            $deactivate_query1 =  $this->db->query($deactivate_qr);

                            if($deactivate_query1) {

                                return "duplicate";
                            } else {

                                return FALSE;
                            } 
                        } 
                    } 
                } else {                 

                    $qr = "INSERT INTO `medhavi_chhatra` (`saral_rg_no`, `ApplicantName`,`Applicantphoto`,`Father_HusbandName`,`DOB`,`Gender`,`Category_id`,`Subcategory_id`,`FamilyID`,`Memberid`,`MobileNumber`,`Permanentaddressofapplicant`,`District`,`Area`,`blockmuncipal`,`VillageSector`,`Postoffice`,`Tehsil_Municipal_id`,`Village_Sector_id`,`Pincode`,`NameoftheInstitute`,`yearofpassingexam`,`Previouscourse_TradeAttended`,`RollNo`,`MarksObtained`,`Marks`,`Marks_percentage`,`YearofAdmission`,`Urban_Rural`,`PresentCourse_TradeAttending`,`GradesGPA`,`BankName`,`IFSCCode`,`AccountNo`,`AccountHolderName`,`CasteCertificate`,`Marksheetscholarshipclaimed`,`CopyofBankAccountNo`,`CopyofIdCard`,`CopyofIncomeCertificate`,`BankBranch`,`familyIncome`,`E_mail`,`applId`,`currentDate`,`application_submission_mode`,`application_ref_no`,`total_amount`,`payment_mode`,`payment_details`,`kiosk_details`,`kiosk_name`,`kiosk_registration_no`,`service_version`,`application_date`,`Haryana_residence_certificate`,`saral_appli_Reg_Date`,`categoryName`,`casteCategoryCode`,`casteDescription`) VALUES ('$saral_rg_no', '$ApplicantName', '$Applicantphoto','$Father_HusbandName', '$DOB', '$Gender','$Category_id', '$Subcategory_id', '$FamilyID','$Memberid', '$MobileNumber', '$Permanentaddressofapplicant','$District_id', '$Area', '$blockmuncipal','$VillageSector', '$Postoffice', '$Tehsil_Municipal_id','$Village_Sector_id', '$Pincode', '$NameoftheInstitute','$yearofpassingexam', '$Previouscourse_TradeAttended', '$RollNo','$MarksObtained', '$Marks', '$Marks_percentage','$YearofAdmission', '$Urban_Rural', '$PresentCourse_TradeAttending','$GradesGPA','$BankName','$IFSCCode','$AccountNo','$AccountHolderName','$CasteCertificate','$Marksheetscholarshipclaimed','$CopyofBankAccountNo','$CopyofIdCard','$CopyofIncomeCertificate','$BankBranch','$familyIncome','$E_mail','$applId','$currentDate','$application_submission_mode','$application_ref_no','$total_amount','$payment_mode','$payment_details','$kiosk_details','$kiosk_name','$kiosk_registration_no','$service_version','$currentDate','$Haryana_residence_certificate','$saral_appli_Reg_Date','$categoryName','$casteCategoryCode','$casteDescription')";

                    $query1 =  $this->db->query($qr);

                    if($query1) {

                        $inserted_id = $this->db->insert_id();
                        $schmId = '4';
                        $status = '1';
                        $qr11 = "INSERT INTO `member_schemes_medhavi_chhatra` (`schemeID`,`cand_id`,`all_status`,`sent_dwo_status_date`) VALUES ('$schmId','$inserted_id','$status','$currentDate')";
                        $qq =  $this->db->query($qr11); 
                        if($qq)
                        {
                            return "applied";
                        }else{

                            return FALSE;
                        }
                    } else {

                        return FALSE;
                    }
                } 
            }

           
        }            
    }


    
    function insertAPIdataVivahShagun($value)
    {		 
		$select_query = "select * from candidates_details where brideMemberId='$value[brideMemberId]'";
        $record = $this->db->query($select_query);
        $record->result_id->num_rows;
      
        if($record->result_id->num_rows > 0){
            $select_query = " SELECT * FROM candidates_details cd
            INNER JOIN  `member_schemes_vivah_shagun` mv ON cd.id=mv.cand_id
            WHERE cd.brideMemberId='$value[brideMemberId]' AND mv.all_status='6'";
            $rec = $this->db->query($select_query);
            
            if($rec->result_id->num_rows > 0){

                
                $qr= "INSERT INTO `db_groom`.`candidates_details_deleted_rejected_applications` SELECT * FROM candidates_details WHERE brideMemberId='$value[brideMemberId]'";

                $run = $this->db->query($qr);
                $cand_id = "select id from candidates_details where brideMemberId='$value[brideMemberId]'";
                $bride_cand_id1 = $this->db->query($cand_id);
                $bride_cand_id = $bride_cand_id1->result_array()[0]['id'];

                if($bride_cand_id){
                    $qr11 = "INSERT INTO `member_schemes_vivah_shagun_deleted_rejected_applications` select * from member_schemes_vivah_shagun where cand_id='$bride_cand_id'";
                    $qq =  $this->db->query($qr11);
                    if($qq){
                        $bride_delete_rejected_app="DELETE FROM member_schemes_vivah_shagun WHERE cand_id='$bride_cand_id'";
                        $delete_status=$this->db->query($bride_delete_rejected_app);
                        
                        if($delete_status){
                            $delete_rejected_app="DELETE FROM candidates_details WHERE brideMemberId='$value[brideMemberId]'";
                            $deleter_status=$this->db->query($delete_rejected_app);

                            if($deleter_status){
                                $qr= "INSERT INTO `db_groom`.`candidates_details` ( `marriageRegistrationId`, `schemeRegistrationId`,`dateOfMarriage`,  `marriageRegistrationDate`,`status`,`applicationDatetime`,`marriageCertificateLink`,`marriageCertificateAttachment`,`schemeCode`,`subSchemeCode`,`groomFamilyId`,`groomMemberID`,`groomFamilyIncome`,`groomName`,`groomFatherName`,`groomMotherName`,`groomDateOfBirth`,`groomGender`,`isGroomDivyang`,`groomDivyangPercentage`,`groomDivyangCategory`,`groomDivyangValidUpto`,`groomDivyangType`,`groomAccountType`,`brideTehsilCode`,`groomBankAccountNumber`,`groomBankIfsc`,`groomAadharNumber`,`groomFamilyNicDName`,`groomFamilyNicDCode`,`groomFamilyNicBtName`,`groomFamilyNicBtCode`,`groomFamilyNicWvName`,`groomFamilyNicWvCode`,`groomTehsil`,`groomTehsilCode`,`groomTehsils`,`groomNicPinCode`,`groomPermanentAddress`,`groomCorrespondenceAddress`,`groomZipCode`,`brideFamilyId`,`brideMemberId`,`brideFamilyIncome`,`brideName`,`brideFatherMemberId`,`brideFatherName`,`brideMotherMemberId`,`brideMotherName`,`brideMotherMaritalStatus`,`brideMotherMaritalStatusAttachment`,`brideMotherMaritalStatusVerified`,`brideDateOfBirth`,`brideGender`,`isBrideDivyang`,`brideBeforeMarriageMaritalStatus`,`brideBeforeMarriageMaritalStatusAttachment`,`brideCaste`,`brideSubCaste`,`brideFamilyNicDName`,`brideFamilyNicDCode`,`brideFamilyNicBtName`,`brideFamilyNicBtCode`,`brideFamilyNicWvName`,`brideFamilyNicWvCode`,`brideTehsil`,`brideTehsils`,`brideNicPinCode`,`bridePermanentAddress`,`brideCorrespondenceAddress`,`brideZipCode`,`brideBankAccountNumber`,`brideBankIfsc`,`brideAccountType`,`brideAadharNumber`,`brideFatherBankAccountNumber`,`brideFatherBankIfsc`,`brideFatherAccountType`,`brideFatherAadharNumber`,`brideMotherBankAccountNumber`,`brideMotherBankIfsc`,`brideMotherAccountType`,`brideMotherAadharNumber`,`Application_date`,`mobile`,`brideDivyangPercentage`,`brideDivyangCategory`,`brideDivyangValidUpto`,`brideDivyangType`,`groomMobileNumber`,`brideMobileNumber`,`isGroomDivyangVerified`,`groomFamilyIncomeVerified`,`groomBankAccountNumberVerified`,`brideFamilyIncomeVerified`,`isBrideDivyangVerified`,`brideCasteVerified`,`brideBankAccountNumberVerified`,`brideFatherBankAccountNumberVerified`,`brideMotherBankAccountNumberVerified`,`brideOrphan`,`brideFatherDeathProof`,`brideMotherDeathProof`) 
                                VALUES
                                ('$value[marriageRegistrationId]','$value[schemeRegistrationId]','$value[dateOfMarriage]','$value[marriageRegistrationDate]','$value[status]','$value[applicationDatetime]','$value[marriageCertificateLink]','$value[marriageCertificateAttachment]','$value[schemeCode]','$value[subSchemeCode]','$value[groomFamilyId]','$value[groomMemberID]','$value[groomFamilyIncome]','$value[groomName]','$value[groomFatherName]','$value[groomMotherName]','$value[groomDateOfBirth]','$value[groomGender]','$value[isGroomDivyang]','$value[groomDivyangPercentage]','$value[groomDivyangCategory]','$value[groomDivyangValidUpto]','$value[groomDivyangType]','$value[groomAccountType]','$value[brideTehsilCode]','$value[groomBankAccountNumber]','$value[groomBankIfsc]','$value[groomAadharNumber]','$value[groomFamilyNicDName]','$value[groomFamilyNicDCode]','$value[groomFamilyNicBtName]','$value[groomFamilyNicBtCode]','$value[groomFamilyNicWvName]','$value[groomFamilyNicWvCode]','$value[groomTehsil]','$value[groomTehsilCode]','$value[groomTehsils]','$value[groomNicPinCode]','$value[groomPermanentAddress]','$value[groomCorrespondenceAddress]','$value[groomZipCode]','$value[brideFamilyId]','$value[brideMemberId]','$value[brideFamilyIncome]','$value[brideName]','$value[brideFatherMemberId]','$value[brideFatherName]','$value[brideMotherMemberId]','$value[brideMotherName]','$value[brideMotherMaritalStatus]','$value[brideMotherMaritalStatusAttachment]','$value[brideMotherMaritalStatusVerified]','$value[brideDateOfBirth]','$value[brideGender]','$value[isBrideDivyang]','$value[brideBeforeMarriageMaritalStatus]','$value[brideBeforeMarriageMaritalStatusAttachment]','$value[brideCaste]','$value[brideSubCaste]','$value[brideFamilyNicDName]','$value[brideFamilyNicDCode]','$value[brideFamilyNicBtName]','$value[brideFamilyNicBtCode]','$value[brideFamilyNicWvName]','$value[brideFamilyNicWvCode]','$value[brideTehsil]','$value[brideTehsils]','$value[brideNicPinCode]','$value[bridePermanentAddress]','$value[brideCorrespondenceAddress]','$value[brideZipCode]','$value[brideBankAccountNumber]','$value[brideBankIfsc]','$value[brideAccountType]','$value[brideAadharNumber]','$value[brideFatherBankAccountNumber]','$value[brideFatherBankIfsc]','$value[brideFatherAccountType]','$value[brideFatherAadharNumber]','$value[brideMotherBankAccountNumber]','$value[brideMotherBankIfsc]','$value[brideMotherAccountType]','$value[brideMotherAadharNumber]','$value[Application_date]','$value[mobile]','$value[brideDivyangPercentage]','$value[brideDivyangCategory]','$value[brideDivyangValidUpto]','$value[brideDivyangType]','$value[groomMobileNumber]','$value[brideMobileNumber]','$value[isGroomDivyangVerified]','$value[groomFamilyIncomeVerified]','$value[groomBankAccountNumberVerified]','$value[brideFamilyIncomeVerified]','$value[isBrideDivyangVerified]','$value[brideCasteVerified]','$value[brideBankAccountNumberVerified]','$value[brideFatherBankAccountNumberVerified]','$value[brideMotherBankAccountNumberVerified]','$value[brideOrphan]','$value[brideFatherDeathProof]','$value[brideMotherDeathProof]')";

                                $run = $this->db->query($qr);
                              
                                if($run){
                                        
                                        $tehsil = $value['brideTehsil'];
                                        $currentDate = $value['Application_date'];
                                        $inserted_id = $this->db->insert_id();
                                                        
                                            $qr11 = "INSERT INTO `member_schemes_vivah_shagun` (`schemeID`,`tahsilname`,`cand_id`,`sent_dwo_status_date`) VALUES ('1','$tehsil','$inserted_id','$currentDate')";
                                            $qq =  $this->db->query($qr11); 
                                            if($qq)
                                            {
                                                return "inserted";
                                            }else{

                                                return FALSE;
                                            }
                                }else{
                                    return FALSE;
                                }
                            }
                        }
                            
                    }else{

                                return FALSE;

                    }
                }
            
                     
            }else{
                
                $recordData = $record->result_array()[0];
                $resp['msg'] = "record_exist";                
                $resp['marriageRegistrationId'] = $recordData['marriageRegistrationId'];
                $resp['appliedDate'] = date("Y-m-d",strtotime($recordData['Application_date']));

                return $resp;
            }
        
        }else{
         
            $qr= "INSERT INTO `db_groom`.`candidates_details` ( `marriageRegistrationId`, `schemeRegistrationId`,`dateOfMarriage`,  `marriageRegistrationDate`,`status`,`applicationDatetime`,`marriageCertificateLink`,`marriageCertificateAttachment`,`schemeCode`,`subSchemeCode`,`groomFamilyId`,`groomMemberID`,`groomFamilyIncome`,`groomName`,`groomFatherName`,`groomMotherName`,`groomDateOfBirth`,`groomGender`,`isGroomDivyang`,`groomDivyangPercentage`,`groomDivyangCategory`,`groomDivyangValidUpto`,`groomDivyangType`,`groomAccountType`,`brideTehsilCode`,`groomBankAccountNumber`,`groomBankIfsc`,`groomAadharNumber`,`groomFamilyNicDName`,`groomFamilyNicDCode`,`groomFamilyNicBtName`,`groomFamilyNicBtCode`,`groomFamilyNicWvName`,`groomFamilyNicWvCode`,`groomTehsil`,`groomTehsilCode`,`groomTehsils`,`groomNicPinCode`,`groomPermanentAddress`,`groomCorrespondenceAddress`,`groomZipCode`,`brideFamilyId`,`brideMemberId`,`brideFamilyIncome`,`brideName`,`brideFatherMemberId`,`brideFatherName`,`brideMotherMemberId`,`brideMotherName`,`brideMotherMaritalStatus`,`brideMotherMaritalStatusAttachment`,`brideMotherMaritalStatusVerified`,`brideDateOfBirth`,`brideGender`,`isBrideDivyang`,`brideBeforeMarriageMaritalStatus`,`brideBeforeMarriageMaritalStatusAttachment`,`brideCaste`,`brideSubCaste`,`brideFamilyNicDName`,`brideFamilyNicDCode`,`brideFamilyNicBtName`,`brideFamilyNicBtCode`,`brideFamilyNicWvName`,`brideFamilyNicWvCode`,`brideTehsil`,`brideTehsils`,`brideNicPinCode`,`bridePermanentAddress`,`brideCorrespondenceAddress`,`brideZipCode`,`brideBankAccountNumber`,`brideBankIfsc`,`brideAccountType`,`brideAadharNumber`,`brideFatherBankAccountNumber`,`brideFatherBankIfsc`,`brideFatherAccountType`,`brideFatherAadharNumber`,`brideMotherBankAccountNumber`,`brideMotherBankIfsc`,`brideMotherAccountType`,`brideMotherAadharNumber`,`Application_date`,`mobile`,`brideDivyangPercentage`,`brideDivyangCategory`,`brideDivyangValidUpto`,`brideDivyangType`,`groomMobileNumber`,`brideMobileNumber`,`isGroomDivyangVerified`,`groomFamilyIncomeVerified`,`groomBankAccountNumberVerified`,`brideFamilyIncomeVerified`,`isBrideDivyangVerified`,`brideCasteVerified`,`brideBankAccountNumberVerified`,`brideFatherBankAccountNumberVerified`,`brideMotherBankAccountNumberVerified`,`brideOrphan`,`brideFatherDeathProof`,`brideMotherDeathProof`) 
            VALUES
            ('$value[marriageRegistrationId]','$value[schemeRegistrationId]','$value[dateOfMarriage]','$value[marriageRegistrationDate]','$value[status]','$value[applicationDatetime]','$value[marriageCertificateLink]','$value[marriageCertificateAttachment]','$value[schemeCode]','$value[subSchemeCode]','$value[groomFamilyId]','$value[groomMemberID]','$value[groomFamilyIncome]','$value[groomName]','$value[groomFatherName]','$value[groomMotherName]','$value[groomDateOfBirth]','$value[groomGender]','$value[isGroomDivyang]','$value[groomDivyangPercentage]','$value[groomDivyangCategory]','$value[groomDivyangValidUpto]','$value[groomDivyangType]','$value[groomAccountType]','$value[brideTehsilCode]','$value[groomBankAccountNumber]','$value[groomBankIfsc]','$value[groomAadharNumber]','$value[groomFamilyNicDName]','$value[groomFamilyNicDCode]','$value[groomFamilyNicBtName]','$value[groomFamilyNicBtCode]','$value[groomFamilyNicWvName]','$value[groomFamilyNicWvCode]','$value[groomTehsil]','$value[groomTehsilCode]','$value[groomTehsils]','$value[groomNicPinCode]','$value[groomPermanentAddress]','$value[groomCorrespondenceAddress]','$value[groomZipCode]','$value[brideFamilyId]','$value[brideMemberId]','$value[brideFamilyIncome]','$value[brideName]','$value[brideFatherMemberId]','$value[brideFatherName]','$value[brideMotherMemberId]','$value[brideMotherName]','$value[brideMotherMaritalStatus]','$value[brideMotherMaritalStatusAttachment]','$value[brideMotherMaritalStatusVerified]','$value[brideDateOfBirth]','$value[brideGender]','$value[isBrideDivyang]','$value[brideBeforeMarriageMaritalStatus]','$value[brideBeforeMarriageMaritalStatusAttachment]','$value[brideCaste]','$value[brideSubCaste]','$value[brideFamilyNicDName]','$value[brideFamilyNicDCode]','$value[brideFamilyNicBtName]','$value[brideFamilyNicBtCode]','$value[brideFamilyNicWvName]','$value[brideFamilyNicWvCode]','$value[brideTehsil]','$value[brideTehsils]','$value[brideNicPinCode]','$value[bridePermanentAddress]','$value[brideCorrespondenceAddress]','$value[brideZipCode]','$value[brideBankAccountNumber]','$value[brideBankIfsc]','$value[brideAccountType]','$value[brideAadharNumber]','$value[brideFatherBankAccountNumber]','$value[brideFatherBankIfsc]','$value[brideFatherAccountType]','$value[brideFatherAadharNumber]','$value[brideMotherBankAccountNumber]','$value[brideMotherBankIfsc]','$value[brideMotherAccountType]','$value[brideMotherAadharNumber]','$value[Application_date]','$value[mobile]','$value[brideDivyangPercentage]','$value[brideDivyangCategory]','$value[brideDivyangValidUpto]','$value[brideDivyangType]','$value[groomMobileNumber]','$value[brideMobileNumber]','$value[isGroomDivyangVerified]','$value[groomFamilyIncomeVerified]','$value[groomBankAccountNumberVerified]','$value[brideFamilyIncomeVerified]','$value[isBrideDivyangVerified]','$value[brideCasteVerified]','$value[brideBankAccountNumberVerified]','$value[brideFatherBankAccountNumberVerified]','$value[brideMotherBankAccountNumberVerified]','$value[brideOrphan]','$value[brideFatherDeathProof]','$value[brideMotherDeathProof]')";

          
            $run = $this->db->query($qr);
          
            if($run){
                    
                    $tehsil = $value['brideTehsil'];
                    $currentDate = $value['Application_date'];
                    $inserted_id = $this->db->insert_id();
                                        
                        $qr11 = "INSERT INTO `member_schemes_vivah_shagun` (`schemeID`,`tahsilname`,`cand_id`,`sent_dwo_status_date`) VALUES ('1','$tehsil','$inserted_id','$currentDate')";
                        $qq =  $this->db->query($qr11); 
                        if($qq)
                        {
                            return "inserted";
                        }else{

                            return FALSE;
                        }
            }else{
                return FALSE;
            }
        }
		
    }
	

    public function full_date_with_current_status(){
        $qr11 = "SELECT cd.*,
                CASE WHEN mvsy.all_status='2'
                THEN 'APPROVED'
                WHEN mvsy.all_status='3'
                THEN 'SANCTIONED' 
                WHEN mvsy.all_status='7'
                THEN 'DISBURSEMENT' 
                WHEN mvsy.all_status='6'
                THEN 'REJECTED' 
                WHEN mvsy.all_status IN ('1','5')
                THEN 'PENDING'
                END AS application_status 
                FROM  candidates_details cd
                INNER JOIN `member_schemes_vivah_shagun` mvsy ON cd.id=mvsy.cand_id";
        $query =  $this->db->query($qr11); 

        if($query->num_rows() > 0) {
                return $query->result_array();
        } else {
                return FALSE;
        }

    }
		public function getAntarjatiyaYojana()
		{
			$qr11 = "SELECT id,`btCodeLGD`,application_Date FROM`tbl_antarjayatia_yojna` WHERE id NOT IN (SELECT cand_id FROM `member_schemes_antarjayatia_yojana`)";
                $query =  $this->db->query($qr11); 
				
			if($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return FALSE;
			}
		}

		public function getAntarjatiyaYojanaUpdate($id,$tehsil,$application_Date)
		{
			$qry = "INSERT INTO member_schemes_antarjayatia_yojana(`schemeID`,`tahsilID`,`cand_id`,`sent_dwo_status_date`) VALUES ('3','$tehsil','$id','$application_Date')";    
            $q =  $this->db->query($qry); 
            if($q)
            {
            	return TRUE;
            }else{
            	return false;
            }
		}
		
		public function dwoApproveNavinikaran_failure_cases()
    {
       
$qry = "SELECT tny.id,tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name`,dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.dwo_approve_date,ms.dwo_approve_remarks 
FROM `tbl_navinikaran_yojana` tny 
INNER JOIN `navinikarn_failed_cases` nfc ON tny.`Application_Ref_No`=nfc.`saral_id`
INNER JOIN `member_schemes` ms ON tny.id=ms.`cand_id`
LEFT JOIN login l ON l.id = ms.`user_id`
INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
WHERE ms.`all_status` ='2' AND ms.`schemeID`='2'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function single_failure_cases()
    {
       
/* $qry = "SELECT mc.id,application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,application_date
,dwo_approve_date,dwo_approve_remarks FROM medhavi_chhatra mc 
INNER JOIN member_schemes ms ON mc.id=ms.cand_id 
INNER JOIN `medhavi_approve_failue_cases` nfc ON mc.`id`=nfc.`candid`
INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
INNER JOIN login lg ON ms.user_id=lg.id
WHERE ms.all_status='2' 
AND ms.schemeID='4'"; */

$qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,application_date,disbursement_remarks,disbursement_date FROM medhavi_chhatra mc 
INNER JOIN member_schemes ms ON mc.id=ms.cand_id INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
INNER JOIN login lg ON ms.user_id=lg.id
WHERE ms.cand_id='56' 
AND ms.schemeID='4'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function dateCalculatesentback()
    {
    	$qry = "SELECT ms.`send_back_date`,ms.sent_dwo_status_date FROM `medhavi_chhatra` mc INNER JOIN member_schemes ms 
ON mc.id=ms.`cand_id` WHERE mc.id='1106' AND ms.`schemeID`='4' AND send_back_date IS NOT NULL";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array()['0'];
        } else {
            return FALSE;
        }
    }

    public function dateCalculateuplodDocuments()
    {
    	$qry = "SELECT td.* FROM `medhavi_chhatra` mc INNER JOIN tbl_documents_status td
ON mc.id=td.`cand_id` WHERE mc.id='1106' AND td.`schemeID`='4'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array()['0'];
        } else {
            return FALSE;
        }
    }  

	public function meddata(){
			
			 $qry = "select id,application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name as dwo_name,application_date,disbursement_remarks,disbursement_date from medhavi_chhatra mc 
inner join member_schemes ms on mc.id=ms.cand_id inner join tbl_saral_medhavi_district md on mc.District=md.distname 
inner join login lg ON ms.user_id=lg.id
where ms.all_status='7' AND ms.schemeID='4' AND ms.disbursement_api_response IS NULL";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
	}
	
	function updateApiResponseon_Disbursement($id,$status,$schemeID,$response)
    {
        echo $qry = "update member_schemes set disbursement_api_response='$response' where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
               
       /*  $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } */
    }


    public function getStatusNavinikaran()
    {
      
        // $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name`,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
        // ms.dwo_approve_date,ms.dwo_approve_remarks, all_status, cand_id, rejection_remarks_two , `rejection_date_two`,sent_dwo_status_date,
        // pending_api_response, pending_pushed_data
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE ms.`schemeID`='2' AND ms.all_status IN ('0','1','5') AND tny.`date_of_application` IS NOT NULL AND tny.date_of_application !=''
        // AND tny.date_of_application !='0000-00-00 00:00:00' AND tny.`Application_Ref_No` NOT IN ('DENOTIFIED/2022/31133','DENOTIFIED/2022/31134', 'DENOTIFIED/2022/31138')
        // AND pending_api_response IS NULL LIMIT 1000";

        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.*,sd.dist_location_code AS dist_location_code,
        sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE ms.`schemeID`='2' AND ms.all_status IN ('0','1','5') AND tny.`date_of_application` IS NOT NULL AND tny.date_of_application !=''
        AND tny.date_of_application !='0000-00-00 00:00:00' AND tny.`Application_Ref_No`IN ('DENOTIFIED/2022/34787')";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhavi()
    {
        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        application_date, all_status, cand_id,md.`distcode` AS saraldistcode,ms.*,md.dist_location_code AS dist_location_code,
        md.distname AS distname 
        FROM medhavi_chhatra mc 
        INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        WHERE ms.all_status IN ('1') AND ms.schemeID='4'
        AND mc.`application_date` IS NOT NULL AND mc.application_date !='' AND mc.application_date !='0000-00-00 00:00:00' 
        AND mc.application_ref_no IN ('DAMCSY/2024/63378')
        ";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusAntarjatiya()
    {
        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // l.name,sent_dwo_status_date,rejection_date_two, all_status, cand_id, rejection_remarks_two, pending_api_response,pending_pushed_data
        // FROM `tbl_antarjayatia_yojna` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        // WHERE ms.all_status IN ('0','1','5') AND ms.schemeID='3'
        // AND tay.`application_Date` IS NOT NULL AND tay.application_Date !='' AND tay.application_Date !='0000-00-00 00:00:00'
        // AND pending_api_response IS NULL";

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode, tay.`familyID`,tay.`memberID`,
        l.name, all_status, cand_id,md.`dist_location_code`,md.`distname`
        FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE ms.all_status IN ('1') AND ms.schemeID='3'
        AND tay.Saral_ID IN ('MMSASY/2023/01959','MMSASY/2023/01969')";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    

    public function updateApiResponseNavinikaranSentback($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set send_back_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranApproved($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set dwo_approve_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranHold($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes set on_hold_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseNavinikaranReject($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set dwo_rejected_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranDisbursement($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set disbursement_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranHoldAfterRTA($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set on_hold_api_response_after_rta='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranHoldAfterRTR($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set on_hold_api_response_after_rtr='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranHoldAfterApproval($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set on_hold_api_response_after_approval='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranHoldAfterSanction($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set on_hold_api_response_after_sanction='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseMedhavi($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set pending_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviSentback($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set send_back_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }
    public function updateApiResponseMedhaviOnHold($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set on_hold_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviApprove($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set dwo_approve_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviSanction($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set app_sanction_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviReject($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set dwo_rejected_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviDisbursement($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_medhavi_chhatra set disbursement_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviDeactivated($id,$status,$schemeID,$response,$encodedArray)
    {
        echo $qry = "update member_schemes_06_01_2023_1128 set pending_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiya($id,$status,$schemeID,$response,$encodedArray)
    {
        echo $qry = "update member_schemes_antarjayatia_yojana set pending_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaSentback($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_antarjayatia_yojana set send_back_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaSanction($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_antarjayatia_yojana set app_sanction_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaHold($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_antarjayatia_yojana set on_hold_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaReject($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_antarjayatia_yojana set dwo_rejected_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);    

        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaDisbursement($id,$status,$schemeID,$response,$encodedArray)
    {
        $qry = "update member_schemes_antarjayatia_yojana set disbursement_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getStatusMedhaviAdhocPanipat()
    {
        $qry = "SELECT application_ref_no,currentDate,mc.ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,mc.District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        application_date, all_status, cand_id, pending_api_response,
        pending_pushed_data, disbursement_date, disbursement_remarks 
        FROM medhavi_chhatra mc INNER JOIN member_schemes ms ON mc.id=ms.cand_id
        INNER JOIN `rts_medhavi_adhoc_panipat` rmap ON rmap.ApplicationRefId = mc.application_ref_no
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        WHERE ms.schemeID='4' AND application_ref_no NOT IN ('DAMCSY/2022/77663')";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviDisbursedAdhocJind()
    {
        $qry = "SELECT application_ref_no,currentDate,mc.ApplicantName,mc.Father_HusbandName,Gender,
        Permanentaddressofapplicant,mc.MobileNumber,E_mail,mc.District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        application_date, all_status, cand_id, pending_api_response,
        pending_pushed_data, disbursement_date, disbursement_remarks 
        FROM medhavi_chhatra mc INNER JOIN member_schemes ms ON mc.id=ms.cand_id
        INNER JOIN `rts_medhavi_adhoc_jind_disbursed` rmajr ON rmajr.`saral_rg_no` = mc.application_ref_no
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        WHERE ms.schemeID='4'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviRejectedAdhocJind()
    {
        $qry = "SELECT application_ref_no,currentDate,mc.ApplicantName,mc.Father_HusbandName,Gender,
        Permanentaddressofapplicant,mc.MobileNumber,E_mail,mc.District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        application_date, all_status, cand_id, pending_api_response,
        pending_pushed_data, dwo_rejected_date, dwo_reject_remarks 
        FROM medhavi_chhatra mc INNER JOIN member_schemes ms ON mc.id=ms.cand_id
        INNER JOIN `rts_medhavi_adhoc_jind_rejected` rmajr ON rmajr.`saral_rg_no` = mc.application_ref_no
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        WHERE ms.schemeID='4'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function get_current_stage_data($id,$userid){
		
		
	echo	$qry1 = "SELECT 
CASE
	WHEN ms.all_status='2'
	THEN ms.dwo_approve_date
	WHEN ms.all_status='3'
	THEN ms.`app_sanction_date`
	WHEN ms.all_status='4'
	THEN ms.`on_hold_date`
	WHEN ms.all_status='6'
	THEN ms.`dwo_rejected_date`
	WHEN ms.all_status='7'
	THEN ms.`disbursement_date`
	ELSE ''
	END AS actiondate
,
CASE
	WHEN ms.all_status='2'
	THEN ms.`dwo_approve_remarks`
	WHEN ms.all_status='3'
	THEN ms.`app_sanction_remarks`
	WHEN ms.all_status='4'
	THEN ms.`on_hold_remarks`
	WHEN ms.all_status='6'
	THEN ms.`dwo_reject_remarks`
	WHEN ms.all_status='7'
	THEN ms.`disbursement_remarks`
	ELSE ''
	END AS actionremarks
,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate,
CASE
	WHEN ms.all_status='2'
	THEN 'Approved'
	WHEN ms.all_status='3'
	THEN 'Sanctioned'
	WHEN ms.all_status='4'
	THEN 'Hold'
	WHEN ms.all_status='6'
	THEN 'Rejected'
	WHEN ms.all_status='7'
	THEN 'Disbursement'
	ELSE ''
	END AS STATUS
 FROM `member_schemes_vivah_shagun` ms
INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
WHERE ms.`user_id`='$userid' AND ms.`cand_id`='$id'";
        $query =  $this->db->query($qry1); 
		// var_dump($query);
		// return $query->num_rows();
		if($query->num_rows() > 0) {
			return $query->result_array()[0];
		} else {
			return FALSE;
		}
	}


    public function rejectGetStatusNavinikaran()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        FROM `rts_rejected_list_16_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='2' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='2' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_five` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='2' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function rejectGetStatusMedhavi()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        FROM `rts_rejected_list_16_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='4' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='4' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_five` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='4' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function rejectGetStatusAntarjatiya()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        FROM `rts_rejected_list_16_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='3' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='3' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_five` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='3' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function rejectGetStatusVivahShagun()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_16_02_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='1' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_rejected_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='1' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND rl.api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        FROM `rts_rejected_list_remainig_five` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='1' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND rl.api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
    public function updateApiResponseReject($encodedArray,$schemeID,$response,$application_number)
    {
        $qry = "update rts_rejected_list_16_02_2023 set api_response='$response', pushed_data='$encodedArray'
        where scheme_id='$schemeID' and application_number='$application_number'"; 
        
        // $qry = "update rts_rejected_list_remainig_three set api_response='$response', pushed_data='$encodedArray'
        // where scheme_id='$schemeID' and application_number='$application_number'"; 

        // $qry = "update rts_rejected_list_remainig_five set api_response='$response', pushed_data='$encodedArray'
        // where scheme_id='$schemeID' and application_number='$application_number'"; 

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function disbursedGetStatusNavinikaran()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_16_02_2023_copy` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='2' AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='2' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_payment_disbursed_list_remainig_five` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='2' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function disbursedGetStatusMedhavi()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_16_02_2023_copy` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='4' AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`scheme_id`
        FROM `rts_payment_disbursed_list_remainig_three` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='4' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_remainig_five` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='4' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function disbursedGetStatusAntarjatiya()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_16_02_2023_copy` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='3' AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='3' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_payment_disbursed_list_remainig_five` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='3' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function disbursedGetStatusVivahShagun()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_16_02_2023_copy` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='1' AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_payment_disbursed_list_remainig_three` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='1' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_payment_disbursed_list_remainig_five` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='1' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseDisbursed($encodedArray,$schemeID,$response,$application_number)
    {
        // $qry = "update rts_payment_disbursed_list_16_02_2023_copy set api_response='$response', pushed_data='$encodedArray'
        // where scheme_id='$schemeID' and application_number='$application_number'";    
        
        // $qry = "update rts_payment_disbursed_list_remainig_three set api_response='$response', pushed_data='$encodedArray'
        // where scheme_id='$schemeID' and application_number='$application_number'";

        $qry = "update rts_payment_disbursed_list_remainig_five set api_response='$response', pushed_data='$encodedArray'
        where scheme_id='$schemeID' and application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function holdGetStatusNavinikaran()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_hold_combined_list` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='2' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_hold_failed_offline_repushed_28_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='2' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function holdGetStatusMedhavi()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_hold_combined_list` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='4' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_hold_failed_offline_repushed_28_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='4' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function holdGetStatusVivahShagun()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_hold_combined_list` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='1' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_hold_failed_offline_repushed_28_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='1' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function holdGetStatusAntarjatiya()
    {
      
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        // FROM `rts_hold_combined_list` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE rl.`scheme_id`='3' 
        // AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        // AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        // AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_hold_failed_offline_repushed_28_02_2023` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='3' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseHold($encodedArray,$schemeID,$response,$application_number)
    {       
        // $qry = "update rts_hold_combined_list set api_response='$response', pushed_data='$encodedArray'
        // where scheme_id='$schemeID' and application_number='$application_number'";

        $qry = "update rts_hold_failed_offline_repushed_28_02_2023 set api_response='$response', pushed_data='$encodedArray'
        where scheme_id='$schemeID' and application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function pendingGetStatusMedhavi()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_pending_combined_list` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='4' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponsePending($encodedArray,$schemeID,$response,$application_number)
    {    
        $qry = "update rts_pending_combined_list set api_response='$response', pushed_data='$encodedArray'
        where scheme_id='$schemeID' and application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function sendbackGetStatusNavinikaran()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_sendback_combined_list` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='2' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function sendbackGetStatusMedhavi()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_sendback_combined_list` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='4' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function sendbackGetStatusAntarjatiya()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_sendback_combined_list` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='3' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function sendbackGetStatusVivahShagun()
    {
      
        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id, rl.`scheme_id`
        FROM `rts_sendback_combined_list` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE rl.`scheme_id`='1' 
        AND rl.`applicant_name` IS NOT NULL AND rl.`mobile` IS NOT NULL
        AND rl.`applicant_name` !='' AND rl.`mobile` !=''
        AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseSendback($encodedArray,$schemeID,$response,$application_number)
    {       
        $qry = "update rts_sendback_combined_list set api_response='$response', pushed_data='$encodedArray'
        where scheme_id='$schemeID' and application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function getStatusMedhaviDisbursedAdhocSirsa()
    {
        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name,
        application_date,disbursement_remarks,disbursement_date,ms.`cand_id`,ms.`all_status` FROM medhavi_chhatra mc 
        INNER JOIN member_schemes ms ON mc.id=ms.cand_id INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='4' AND application_ref_no IN ('DAMCSY/2022/78303',
'DAMCSY/2022/80262',
'DAMCSY/2022/80991',
'DAMCSY/2022/81335',
'DAMCSY/2022/82521',
'DAMCSY/2022/83632',
'DAMCSY/2022/83777',
'DAMCSY/2022/84302',
'DAMCSY/2022/85141',
'DAMCSY/2022/85195',
'DAMCSY/2022/85372',
'DAMCSY/2022/85902',
'DAMCSY/2022/86760',
'DAMCSY/2022/86807',
'DAMCSY/2022/88975',
'DAMCSY/2022/94959',
'DAMCSY/2022/95012',
'DAMCSY/2022/95674',
'DAMCSY/2023/03192',
'DAMCSY/2023/07223')";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function get_status_under_process_outside_rts_push_medhavi()
    {
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,
        // rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `medhavi_under_process_outside_rts_01_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE `last_action_date` != '' AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,rl.scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_dummy_name_data_offline` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE applicant_name != 'xxxxxxxxxx' AND scheme_id='4' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_cases_offline_Faridabad_28_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE scheme_id='4' AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        rl.remarks_at_dwo,rl.last_action_date, rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        FROM `Offline_ReturnToCitizen_remaining_Cases_09022024` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE scheme_id='4' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate)
    {
        // $qry = "update medhavi_under_process_outside_rts_01_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        // $qry = "update rts_dummy_name_data_offline set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number' and scheme_id='$scheme_id'";

        // $qry = "update rts_cases_offline_Faridabad_28_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        $qry = "update Offline_ReturnToCitizen_remaining_Cases_09022024 set api_response='$response', pushed_data='$encodedArray',
        pushed_date='$currentDate' where application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_status_under_process_outside_rts_push_navinikaran()
    {
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `navinikaran_under_process_outside_rts_02_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE `last_action_date` != '' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`
        // FROM `navinikaran_under_process_outside_rts_02_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE `last_action_date` != '' AND api_response IS NULL AND all_status='7' LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,rl.scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_dummy_name_data_offline` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE applicant_name != 'xxxxxxxxxx' AND scheme_id='2' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_cases_offline_Faridabad_28_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE scheme_id='2' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        FROM `Offline_ReturnToCitizen_Cases_Yamunanagar_12012024` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE scheme_id='2' AND all_status IS NOT NULL AND api_response IS NULL
        -- AND application_number IN ('21742285','DEPT-HOUSING-197823')
        ";


        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate)
    {
        // $qry = "update navinikaran_under_process_outside_rts_02_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        // $qry = "update rts_dummy_name_data_offline set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number' and scheme_id='$scheme_id'";

        // $qry = "update rts_cases_offline_Faridabad_28_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        $qry = "update Offline_ReturnToCitizen_Cases_Yamunanagar_12012024 set api_response='$response', pushed_data='$encodedArray',
        pushed_date='$currentDate' where application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_status_under_process_outside_rts_push_VivahShagun()
    {
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`
        // FROM `vivahshagun_under_process_outside_rts_01_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE `last_action_date` != '' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,rl.scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_dummy_name_data_offline` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE applicant_name != 'xxxxxxxxxx' AND scheme_id='1' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_cases_offline_Faridabad_28_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE scheme_id='1' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        FROM `Offline_ReturnToCitizen_remaining_Cases_09022024` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE scheme_id='1' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";


        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id)
    {
        // $qry = "update vivahshagun_under_process_outside_rts_01_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        // $qry = "update rts_dummy_name_data_offline set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number' and scheme_id='$scheme_id'";

        // $qry = "update rts_cases_offline_Faridabad_28_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        $qry = "update Offline_ReturnToCitizen_remaining_Cases_09022024 set api_response='$response', pushed_data='$encodedArray',
        pushed_date='$currentDate' where application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_status_under_process_outside_rts_push_Antarjatiya()
    {
        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `antarjatiya_under_process_outside_rts_01_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE `last_action_date` != '' AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,rl.scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_dummy_name_data_offline` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE applicant_name != 'xxxxxxxxxx' AND scheme_id='3' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        // $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        // sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        // rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        // FROM `rts_cases_offline_Faridabad_28_03_2023` rl 
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        // WHERE scheme_id='3' AND api_response IS NULL LIMIT 1000";

        $qry = "SELECT rl.`application_number`,rl.`applicant_name`,rl.`application_start_date`,rl.`mobile`,rl.`file_with_user`,
        sd.`distcode` AS saraldistcode,sd.`distname`,sd.`dist_location_code`,scheme_id,
        rl.remarks_at_dwo,rl.last_action_date , rl.rts_date, rl.saral_id,rl.`all_status`,rl.`family_id`
        FROM `Offline_ReturnToCitizen_remaining_Cases_09022024` rl 
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=rl.`district_name`
        WHERE scheme_id='3' AND all_status IS NOT NULL AND api_response IS NULL LIMIT 1000";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        }  
    }

    public function update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate)
    {
        // $qry = "update antarjatiya_under_process_outside_rts_01_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        // $qry = "update rts_dummy_name_data_offline set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number' and scheme_id='$scheme_id'";

        // $qry = "update rts_cases_offline_Faridabad_28_03_2023 set api_response='$response', pushed_data='$encodedArray',
        // pushed_date='$currentDate' where application_number='$application_number'";

        $qry = "update Offline_ReturnToCitizen_remaining_Cases_09022024 set api_response='$response', pushed_data='$encodedArray',
        pushed_date='$currentDate' where application_number='$application_number'";

        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }



    public function dwo_fill_data($schmId,$district){
        
        $qry = "SELECT tny.`application_number`,tny.`saral_id`,tny.`applicant_name`,tny.`mobile`,tny.`application_start_date`,
        tny.`rts_date`,tny.`last_action_date`,tny.`remarks_at_dwo`
        FROM `medhavi_under_process_outside_rts_01_03_2023_test` tny
        WHERE tny.district_name='$district' 
        AND scheme_id='$schmId'
        AND last_action_date IS NULL 
        AND remarks_at_dwo IS NULL";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
        
    }

    public function dwo_fill_data_update($schmId,$application_number,$last_action_date_format,$remarks_at_dwo){

        // echo "data: ".$application_number." ".$schmId." ".$last_action_date_format." ".$remarks_at_dwo." ";
        $qry = "UPDATE `medhavi_under_process_outside_rts_01_03_2023_test` 
        SET last_action_date='$last_action_date_format', remarks_at_dwo='$remarks_at_dwo'        
        WHERE application_number='$application_number' AND scheme_id='$schmId'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
	
	public function getStatus_antarjatiya_hold_AdhocSirsa()
    {
		
      /*  $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,md.dist_location_code AS dist_location_code,
        md.distname AS distname,ms.all_status,ms.cand_id FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.`id`=ms.`cand_id`
        INNER JOIN `antarjatiya_pushed` ap ON tay.`Saral_ID`=ap.`sid`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='3' AND all_status IN ('4')";  */

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,md.dist_location_code AS dist_location_code,
        md.distname AS distname,ms.all_status,ms.cand_id 
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.`id`=ms.`cand_id`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='3' AND all_status IN ('4') 
        and Saral_ID IN ('')
        "; 
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
		
	}
	
	public function getStatus_antarjatiya_hold_Treasury_bill_issueSirsa()
    {
		

/*  $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
`Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id 
FROM `tbl_antarjayatia_yojna` tay
INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
INNER JOIN login lg ON ms.user_id=lg.id
WHERE  Saral_ID IN ('MMSASY/2023/00162') 
AND schemeID='3' AND all_status='4'"; */

 $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
`Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id 
FROM `tbl_antarjayatia_yojna` tay
INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
INNER JOIN login lg ON ms.user_id=lg.id
WHERE  Saral_ID IN ('MMSASY/2023/00172','MMSASY/2023/00181','MMSASY/2023/00523','MMSASY/2023/00530','MMSASY/2023/00557') 
AND schemeID='3' AND all_status='4'"; 
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
		
	}
	
	public function getStatus_antarjatiya_sendback()
    {
		


        /*  $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,`send_back_remarks`,`send_back_date`,md.dist_location_code AS dist_location_code,
        md.distname AS distname,ms.all_status,ms.cand_id FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.`id`=ms.`cand_id`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='3' AND all_status IN ('8') AND Saral_ID IN ('MMSASY/2023/00146')"; */ 

        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // lg.name AS dwo_name,`application_Date`,`send_back_remarks`,`send_back_date`,md.dist_location_code AS dist_location_code,
        // md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM `tbl_antarjayatia_yojna` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.`id`=ms.`cand_id`
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE ms.schemeID='3' AND ms.all_status='8'
        // AND Saral_ID IN ('MMSASY/2023/01909')"; 

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,`send_back_remarks`,`send_back_date`,md.dist_location_code AS dist_location_code,
        md.distname AS distname,ms.all_status,ms.cand_id 
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.`id`=ms.`cand_id`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.schemeID='3' AND ms.all_status='8'
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.send_back_date)
        AND DATE(ms.send_back_date) < DATE(NOW())
        AND ms.send_back_api_response IS NULL
        "; 

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
		
	}
	
	
	
	
	 function getStatusMedhavisend_backAdhocSirsa()
    {
       /*  $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,
application_date,send_back_remarks,send_back_date,md.dist_location_code AS dist_location_code,md.distname AS distname
,ms.all_status,ms.cand_id FROM medhavi_chhatra mc 
INNER JOIN jhajjar_medhavi jm ON mc.`application_ref_no`=jm.`sid`
INNER JOIN member_schemes ms ON mc.id=ms.cand_id 
INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
LEFT JOIN login lg ON ms.user_id=lg.id
WHERE  ms.schemeID='4' AND all_status ='8' and application_ref_no='DAMCSY/2023/45657'"; */

 $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,
application_date,send_back_remarks,send_back_date,md.dist_location_code AS dist_location_code,md.distname AS distname
,ms.all_status,ms.cand_id 
FROM medhavi_chhatra mc 
INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
LEFT JOIN login lg ON ms.user_id=lg.id
WHERE  ms.schemeID='4' AND all_status ='8' and application_ref_no='DAMCSY/2023/44693'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnHoldForDWOPending()
    {
      
    $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,
    tny.`date_of_application`,tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,
    tny.`District`,l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
    ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname,
    'Hold for DWO Pending' AS `pending_remarks`, NOW() AS `pending_date`
    FROM `tbl_navinikaran_yojana` tny 
    INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
    LEFT JOIN login l ON l.id = ms.`user_id`
    INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
    INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
    WHERE  ms.schemeID='2' AND all_status='5' AND tny.Mobile !=''
    AND tny.`Application_Ref_No` IN ('DENOTIFIED/2023/25178')
    ";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatusNavinikarn_send_back()
    {
       
        $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`send_back_remarks`,
        `send_back_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        -- INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='8' AND tny.Mobile !=''
        AND  tny.`Application_Ref_No` IN ('DENOTIFIED/2023/14304','DENOTIFIED/2023/14195')
        ";

        // $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`send_back_remarks`,
        // `send_back_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `Under_Process_Navinikaran_Total_01112022_To_12062023` sr
        // INNER JOIN `tbl_navinikaran_yojana` tny ON sr.ApplicationNumber=tny.`Application_Ref_No`
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND ms.all_status='8' AND tny.Mobile !=''
        // AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.send_back_date)
        // AND DATE(ms.send_back_date) < DATE(NOW())
        // AND ms.send_back_api_response IS NULL
        // "; 

        // $qry = "SELECT * FROM (
        //     SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        //             tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        //             dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`send_back_remarks`,
        //             `send_back_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        //             FROM `tbl_navinikaran_yojana` tny
        //         INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
        //         LEFT JOIN login l ON l.id = ms.`user_id`
        //             INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        //             INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        //         WHERE  ms.schemeID='2'  AND all_status='8' AND ms.send_back_api_response IS NULL
        //     ) p WHERE DATE(date_of_application) = DATE(send_back_date)
        // ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnApproved()
    {
      
        // $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,
        // tny.`date_of_application`,tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,
        // l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
        // ms.`dwo_approve_remarks`,`dwo_approve_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,
        // sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana` tny 
        // -- INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='2' 
        // -- AND tny.Mobile !=''
        // AND dwo_approve_api_response NOT LIKE '%STATUS_ID%:%000%'
        // ";

        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,
        tny.`date_of_application`,tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,
        l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
        ms.`dwo_approve_remarks`,`dwo_approve_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,
        sd.distname AS distname 
        FROM `Under_Process_Navinikaran_Total_01112022_To_12062023` sr
        INNER JOIN `tbl_navinikaran_yojana` tny ON sr.ApplicationNumber=tny.`Application_Ref_No`
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='2' 
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.dwo_approve_date)
        AND DATE(ms.dwo_approve_date) < DATE(NOW())
        -- AND ms.`dwo_approve_api_response` IS NULL
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnHoldAfterApproved()
    {
        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,
        tny.`date_of_application`,tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,
        l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
        ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,
        'Hold after Approval' AS `dwo_approve_remarks`, NOW() AS `dwo_approve_date`,
        sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='2' 
        AND tny.`Application_Ref_No` IN ('DENOTIFIED/2022/35929')
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnHold()
    {
        // $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`on_hold_remarks`,
        // `on_hold_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='4' AND tny.Mobile !=''
        // AND  tny.`Application_Ref_No` IN (SELECT Saral_ID FROM Under_Process_outside_RTS_Navinikaran_Total_19102023 WHERE all_status='4')
        // -- AND ms.`on_hold_api_response` IS NULL
        // ";

        // $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`on_hold_remarks`,
        // `on_hold_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM Under_Process_Navinikaran_Total_13062023_To_30062023 sr
        // INNER JOIN `tbl_navinikaran_yojana` tny ON sr.ApplicationNumber=tny.`Application_Ref_No` 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND ms.all_status='4' AND tny.Mobile !=''
        // AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.on_hold_date)
        // AND DATE(ms.on_hold_date) < DATE(NOW())
        // AND ms.on_hold_api_response IS NULL
        // ";

        $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`on_hold_remarks`,
        `on_hold_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND ms.all_status='4' AND tny.Mobile !=''
        AND ms.on_hold_api_response IS NULL
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnSanctioned()
    {
      
    $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
    tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`app_sanction_remarks`,`app_sanction_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
    FROM `tbl_navinikaran_yojana` tny 
    -- INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
    INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
    LEFT JOIN login l ON l.id = ms.`user_id`
    INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
    INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
    WHERE  ms.schemeID='2' AND all_status='3' AND tny.Mobile !=''
    
    ";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikarnHoldAfterSanctioned()
    {
      
    $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,
    tny.`date_of_application`,tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,
    tny.`District`,l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,
    ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname,
    'Hold after Sanction' AS `app_sanction_remarks`, NOW() AS `app_sanction_date`
    FROM `tbl_navinikaran_yojana` tny 
    INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
    LEFT JOIN login l ON l.id = ms.`user_id`
    INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
    INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
    WHERE  ms.schemeID='2' AND all_status='3' AND tny.Mobile !=''
    AND tny.`Application_Ref_No` IN ('DENOTIFIED/2023/04529')
    ";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatusNavinikarn_reject()
    {

        //  $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`dwo_reject_remarks`,
        // `dwo_rejected_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='6' AND tny.Mobile !='' AND dwo_rejected_date NOT LIKE '%2023-07-10%'";

        // $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`dwo_reject_remarks`,
        // `dwo_rejected_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM Under_Process_Outside_RTS_Navinikaran_07112023 sr
        // INNER JOIN `tbl_navinikaran_yojana` tny ON sr.ApplicationNumber=tny.`Application_Ref_No`
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='6' 
        // -- AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.dwo_rejected_date)
        // AND DATE(ms.dwo_rejected_date) < DATE(NOW())
        // -- AND ms.dwo_rejected_api_response IS NULL
        // -- AND tny.Mobile !='' 
        // -- AND dwo_rejected_api_response LIKE '%You can send only 50000 Records in one day for one Application. Today Total Records are : 0%'
        // -- AND dwo_rejected_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND tny.Application_Ref_No IN ('DENOTIFIED/2023/00050')
        // -- AND  tny.`Application_Ref_No` IN (SELECT Saral_ID FROM Under_Process_outside_RTS_Navinikaran_Total_19102023 WHERE all_status='6')
        // ";
        
        // $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`dwo_reject_remarks`,
        // `dwo_rejected_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana_deleted_rejected_applications` tny 
        // INNER JOIN `member_schemes_navinikaran_deleted_rejected_applications` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='6' AND tny.Mobile !='' 
        // AND tny.Application_Ref_No IN ('DENOTIFIED/2023/317424','DENOTIFIED/2023/317469','DENOTIFIED/2023/349151')
        // -- AND  tny.`Application_Ref_No` IN (SELECT Saral_ID FROM Under_Process_outside_RTS_Navinikaran_Total_19102023 WHERE all_status IS NULL)
        // -- AND ms.`dwo_rejected_api_response` IS NULL
        // ";

        $qry = "SELECT  tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`dwo_reject_remarks`,
        `dwo_rejected_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='6' 
        -- AND tny.Mobile !='' 
        -- AND  tny.`Application_Ref_No` IN (SELECT Application_Ref_No FROM NavinikaranNotPendingTehsilNameWithDiffrentTehsilCode_01012024)
        -- AND dwo_rejected_date NOT LIKE '%2023-07-10%'
        AND  tny.`Application_Ref_No` IN ('DENOTIFIED/2022/31891')
        ";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatusNavinikarnDisbursed()
    {
       
        // $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.disbursement_remarks,ms.disbursement_date,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE    ms.all_status='7' AND ms.schemeID='2' 
        // AND tny.date_of_application !='' AND ms.disbursement_date < '2023-03-13 09:49:18' AND tny.Mobile !=''";

        /* $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.disbursement_remarks,ms.disbursement_date,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE    ms.all_status='7' AND ms.schemeID='2' 
        AND `Application_Ref_No` IN ('DENOTIFIED/2022/33366','DENOTIFIED/2023/05572',
        'DENOTIFIED/2023/05992','DENOTIFIED/2023/03243',
        'DENOTIFIED/2023/03301') AND tny.Mobile !=''"; */
        /* $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,disbursement,ms.`disbursement_remarks`,
        `disbursement_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='7' AND tny.Mobile !='' AND disbursement_date NOT LIKE '%2023-06-21%'"; */

        // $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        // dm.`name` AS dname,sd.`distcode` AS saraldistcode,disbursement,ms.`disbursement_remarks`,
        // `disbursement_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE  ms.schemeID='2' AND all_status='7' 
        // -- AND disbursement_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND tny.Application_Ref_No IN ('DENOTIFIED/2023/47286') 
        // AND  tny.`Application_Ref_No` IN (SELECT Saral_ID FROM Under_Process_outside_RTS_Navinikaran_Total_19102023 WHERE all_status='7')
        // -- AND ms.`disbursement_api_response` IS NULL
        // ";

        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,disbursement,ms.`disbursement_remarks`,
        `disbursement_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM Under_Process_Navinikaran_Total_01112022_To_12062023 sr
        INNER JOIN `tbl_navinikaran_yojana` tny ON sr.ApplicationNumber=tny.`Application_Ref_No` 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND ms.all_status='7' 
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.disbursement_date)
        AND DATE(ms.disbursement_date) < DATE(NOW())
        AND (sr.ActionStatus != 'Application Rejected' AND sr.ActionStatus != 'Service Completed')
        -- AND ms.disbursement_api_response IS NULL
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	

    function getStatusMedhaviSentbackAdhoc()
    {

        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,
        application_date,send_back_remarks,send_back_date,md.dist_location_code AS dist_location_code,md.distname AS distname
        ,ms.all_status,ms.cand_id 
        FROM medhavi_chhatra mc 
        INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' 
        AND all_status ='8' 
        -- AND send_back_api_response NOT LIKE '%STATUS_ID%:%000%'
        -- AND send_back_api_response LIKE '%You can send only 50000 Records in one day for one Application. Today Total Records are : 0%'
        AND application_ref_no IN ('DAMCSY/2024/   ') 
        ";

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,
        // application_date,send_back_remarks,send_back_date,md.dist_location_code AS dist_location_code,md.distname AS distname
        // ,ms.all_status,ms.cand_id 
        // FROM `Under_Process_Medhavi_Total_filtered_27102023` sr
        // INNER JOIN `medhavi_chhatra` mc ON sr.ApplicationNumber=mc.`application_ref_no`
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' 
        // AND all_status ='8' 
        // -- AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.send_back_date)
        // -- AND DATE(ms.send_back_date) < DATE(NOW())
        // -- AND send_back_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND send_back_api_response LIKE '%You can send only 50000 Records in one day for one Application. Today Total Records are : 0%'
        // -- AND application_ref_no IN ('DAMCSY/2023/52682')
        // ";


        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviApproveAdhoc()
    {
       
        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,dwo_approve_remarks,dwo_approve_date,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM medhavi_chhatra mc 
        // -- INNER JOIN jhajjar_medhavi jm ON mc.`application_ref_no`=jm.`sid`
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='2' 
        // -- AND mc.application_ref_no IN ('DAMCSY/2023/49104','DAMCSY/2023/49070')
        // AND dwo_approve_api_response NOT LIKE '%STATUS_ID%:%000%'
        // ";  

        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,dwo_approve_remarks,dwo_approve_date,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id 
        FROM `Under_Process_Medhavi_Total_filtered_27102023` sr
        INNER JOIN medhavi_chhatra mc ON sr.ApplicationNumber=mc.`application_ref_no`
        INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status='2' 
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.dwo_approve_date)
        AND DATE(ms.dwo_approve_date) < DATE(NOW())
        ";  

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviSanctionAdhoc()
    {
       
        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,app_sanction_remarks,app_sanction_date,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id 
        FROM medhavi_chhatra mc 
        -- INNER JOIN jhajjar_medhavi jm ON mc.`application_ref_no`=jm.`sid`
        INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status='3' 
        AND mc.application_ref_no IN ('DAMCSY/2023/60490')
        -- AND app_sanction_api_response NOT LIKE '%STATUS_ID%:%000%'
        ";  

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviRejectedAdhocSirsa()
    {
        /*  $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,`dwo_reject_remarks`,`dwo_rejected_date`,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id FROM medhavi_chhatra mc 
        INNER JOIN member_schemes ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status IN ('6') AND application_ref_no in ('DAMCSY/2022/101853','DAMCSY/2023/13785','DAMCSY/2023/28287','DAMCSY/2023/36212')";  */

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,dwo_reject_remarks,dwo_rejected_date,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM medhavi_chhatra mc
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='6' 
        // AND dwo_rejected_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND mc.application_ref_no IN ('DAMCSY/2022/89706','DAMCSY/2023/00005','DAMCSY/2022/81764','DAMCSY/2023/00003')
        // ";  

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,dwo_reject_remarks,dwo_rejected_date,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM `Under_Process_Medhavi_Total_filtered_27102023` sr
        // INNER JOIN `medhavi_chhatra` mc ON sr.ApplicationNumber=mc.`application_ref_no`
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='6' 
        // AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.dwo_rejected_date)
        // AND DATE(ms.dwo_rejected_date) < DATE(NOW())
        // "; 

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,dwo_reject_remarks,dwo_rejected_date,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM `medhavi_chhatra` mc
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='6' 
        // AND application_ref_no IN (
        //     SELECT application_ref_no FROM `Medhavi_update_names_21122023`
        //     )
        // "; 

        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,dwo_reject_remarks,dwo_rejected_date,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id 
        FROM `medhavi_chhatra_deleted_rejected_applications` mc
        INNER JOIN `member_schemes_deleted_rejected_applications` ms ON mc.id=ms.cand_id
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status='6' 
        AND application_ref_no IN (
            SELECT application_ref_no FROM `Medhavi_update_names_deletedRejected_21122023`
            )
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatusMedhaviDisbursedAdhocSirsa_1()
    {
        /* $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,lg.name AS dwo_name,application_date,disbursement_remarks,disbursement_date,md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id FROM medhavi_chhatra mc 
        INNER JOIN member_schemes ms ON mc.id=ms.cand_id INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE mc.Memberid IN (SELECT mc.`Memberid` FROM `medhavi_chhatra` mc
        INNER JOIN `jhajjar_medhavi` jm ON mc.`application_ref_no`=jm.`sid`
        INNER JOIN  `member_schemes` ms ON mc.`id`=ms.`cand_id`
        WHERE schemeID='4') 
        AND ms.schemeID='4' AND all_status='7'
        "; */ 

        /* $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,disbursement_remarks,disbursement_date,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id FROM medhavi_chhatra mc 
        INNER JOIN member_schemes ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE mc.Memberid IN (SELECT mc.`Memberid` FROM `medhavi_chhatra` mc
        INNER JOIN `jhajjar_medhavi` jm ON mc.`application_ref_no`=jm.`sid`
        INNER JOIN  `member_schemes` ms ON mc.`id`=ms.`cand_id`
        WHERE schemeID='4') 
        AND ms.schemeID='4' AND all_status='7'
        "; */

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,disbursement_remarks,disbursement_date,disbursement,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM `Under_Process_Medhavi_Total_filtered_27102023` sr
        // INNER JOIN medhavi_chhatra mc ON sr.ApplicationNumber=mc.`application_ref_no`
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='7' 
        // AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.disbursement_date)
        // AND DATE(ms.disbursement_date) < DATE(NOW())
        // AND mc.application_ref_no NOT IN ('DAMCSY/2023/47325',
        // 'DAMCSY/2023/47612',
        // 'DAMCSY/2023/47730',
        // 'DAMCSY/2023/47767',
        // 'DAMCSY/2023/48443')
        // ";

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        // ,lg.name AS dwo_name,application_date,disbursement_remarks,disbursement_date,disbursement,md.dist_location_code AS dist_location_code
        // ,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM medhavi_chhatra mc
        // INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE  ms.schemeID='4' AND all_status='7' 
        // AND mc.application_ref_no IN ('DAMCSY/2024/14236')
        // -- AND mc.application_ref_no IN (
        // --     SELECT application_ref_no FROM `Medhavi_update_names_21122023`
        // --     )
        // ";

        $qry = "
            SELECT   * FROM(
                SELECT application_ref_no, currentDate, ApplicantName, Father_HusbandName, Gender,
                Permanentaddressofapplicant, MobileNumber, E_mail, District, md.distcode, mc.FamilyID, mc.Memberid,
                lg.name AS dwo_name,application_date,disbursement,ms.cand_id,
                md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,  ms.`disbursement_date`,
                ms.`disbursement_remarks`, ms.`disbursement_api_response`,
                CASE
                WHEN ms.`all_status`='1'
                THEN IF (ms.`user_resp_date` IS NULL, mc.`application_date`, ms.`user_resp_date`)
                WHEN ms.`all_status`='2'
                THEN ms.`dwo_approve_date`
                WHEN ms.`all_status`='3'
                THEN ms.`app_sanction_date`
                WHEN ms.`all_status`='4'
                THEN ms.`on_hold_date`
                WHEN ms.`all_status`='6'
                THEN ms.`dwo_rejected_date`
                WHEN ms.`all_status`='7'
                THEN ms.`disbursement_date`
                WHEN ms.`all_status`='8'
                THEN ms.`send_back_date`
                ELSE ''
                END AS Last_Action_Date, 
                CASE
                WHEN ms.`all_status`='1'
                THEN 'Application Submitted'
                WHEN ms.`all_status`='2'
                THEN ms.`dwo_approve_remarks`
                WHEN ms.`all_status`='3'
                THEN ms.`app_sanction_remarks`
                WHEN ms.`all_status`='4'
                THEN ms.`on_hold_remarks`
                WHEN ms.`all_status`='6'
                THEN ms.`dwo_reject_remarks`
                WHEN ms.`all_status`='7'
                THEN ms.`disbursement_remarks`
                WHEN ms.`all_status`='8'
                THEN ms.`send_back_remarks`
                ELSE ''
                END AS Last_Action_Remarks,
                CASE
                WHEN ms.`all_status`='1'
                THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
                WHEN ms.`all_status`='2'
                THEN ms.`dwo_approve_api_response`
                WHEN ms.`all_status`='3'
                THEN ms.`app_sanction_api_response`
                WHEN ms.`all_status`='4'
                THEN ms.`on_hold_api_response`
                WHEN ms.`all_status`='6'
                THEN ms.`dwo_rejected_api_response`
                WHEN ms.`all_status`='7'
                THEN ms.`disbursement_api_response`
                WHEN ms.`all_status`='8'
                THEN ms.`send_back_api_response`
                ELSE ''
                END AS Last_Action_Api_Response,
                CASE
                WHEN ms.`all_status`='1'
                THEN '1'
                WHEN ms.`all_status`='2'
                THEN '4'
                WHEN ms.`all_status`='3'
                THEN '8'
                WHEN ms.`all_status`='4'
                THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
                WHEN ms.`all_status`='6'
                THEN '10'
                WHEN ms.`all_status`='7'
                THEN '10'
                WHEN ms.`all_status`='8'
                THEN '1'
                ELSE ''
                END AS Saral_Level,
                CASE
                WHEN ms.`all_status`='1'
                THEN 'E'
                WHEN ms.`all_status`='2'
                THEN 'A'
                WHEN ms.`all_status`='3'
                THEN 'A'
                WHEN ms.`all_status`='4'
                THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
                WHEN ms.`all_status`='6'
                THEN 'R'
                WHEN ms.`all_status`='7'
                THEN 'A'
                WHEN ms.`all_status`='8'
                THEN 'H'
                ELSE ''
                END AS Saral_Last_Action,
                CASE
                WHEN ms.`all_status`='1'
                THEN 'Application Submission'
                WHEN ms.`all_status`='2'
                THEN 'Document Verification and Case Approval'
                WHEN ms.`all_status`='3'
                THEN 'Raise EPS'
                WHEN ms.`all_status`='4'
                THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
                WHEN ms.`all_status`='6'
                THEN 'Delivery'
                WHEN ms.`all_status`='7'
                THEN 'Delivery'
                WHEN ms.`all_status`='8'
                THEN 'Application Submission'
                ELSE ''
                END AS Saral_Last_Action_Desc,
                CASE
                WHEN ms.`all_status`='1'
                THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
                ELSE ''
                END AS Last_Action_type
                FROM `medhavi_chhatra` mc 
                INNER JOIN `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
                INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
                LEFT JOIN login lg ON ms.user_id=lg.id
                
            ) p
            WHERE  all_status='7'  AND
            DATE(Last_Action_Date) >= '2024-08-01' AND DATE(Last_Action_Date)!= DATE(NOW())
            -- DATE(Last_Action_Date) = '2023-11-15'
            -- DATE(Last_Action_Date) = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)
            AND (Last_Action_Api_Response IS NULL 
            OR Last_Action_Api_Response NOT LIKE '%Success%') 
            AND Saral_Last_Action = 'A' AND Saral_Level = '10'
            ORDER BY Saral_Last_Action, Saral_Level
            LIMIT 20000
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatusMedhaviSanctionedAdhocSirsa()
    {
		$qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,`app_sanction_remarks`,`app_sanction_date`,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id 
        FROM medhavi_chhatra mc 
        INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status='3' AND application_ref_no IN ('Damcsy/2023/74067','DAMCSY/2023/74245')"; 
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
		
	}
	
	public function getStatusMedhaviApprovedAdhocSirsa()
    {
		$qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid
        ,lg.name AS dwo_name,application_date,`dwo_approve_remarks`,`dwo_approve_date`,md.dist_location_code AS dist_location_code
        ,md.distname AS distname,ms.all_status,ms.cand_id FROM medhavi_chhatra mc 
        INNER JOIN jhajjar_medhavi jm ON mc.`application_ref_no`=jm.`sid`
        INNER JOIN member_schemes ms ON mc.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE  ms.schemeID='4' AND all_status='2'"; 
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
		
	}
	
	public function getStatusNavinikarn_hold_lack_of_budget()
    {
       
        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`on_hold_remarks`,
        `on_hold_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN  `navinikarn_pushed`jm ON tny.`Application_Ref_No`=jm.`sid`
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND all_status='4' AND tny.Mobile !='' AND tny.`Application_Ref_No` NOT IN ('DENOTIFIED/2023/19622')";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function getStatusMedhavi_deactivated_AdhocSirsa()
    {
       /*  $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,
        mc.Memberid,lg.name AS dwo_name,application_date,`send_back_date`,`send_back_remarks`,
        md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id FROM push_to_deactivate mc 
        INNER JOIN `member_schemes_06_01_2023_1128` ms ON mc.id=ms.cand_id
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE `schemeID`='4' AND all_status='8' AND application_ref_no NOT IN ('DAMCSY/2022/98600','DAMCSY/2022/78054','DAMCSY/2022/78445')";  */

        /*  $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,
        mc.Memberid,lg.name AS dwo_name,application_date,`dwo_rejected_date`,`dwo_reject_remarks`,
        md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id FROM push_to_deactivate mc 
        INNER JOIN `member_schemes_06_01_2023_1128` ms ON mc.id=ms.cand_id
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE `schemeID`='4' AND all_status='6'";  */

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,
        // mc.Memberid,lg.name AS dwo_name,application_date,`dwo_approve_date`,`dwo_approve_remarks`,
        // md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id 
        // FROM push_to_deactivate mc 
        // INNER JOIN `member_schemes_06_01_2023_1128` ms ON mc.id=ms.cand_id
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE `schemeID`='4' AND all_status='7'"; 

      $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,
        mc.Memberid,lg.name AS dwo_name,application_date,`dwo_approve_date`,`dwo_approve_remarks`,
        md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id,dd.`deactivated_date`
        FROM `medhavi_chhatra_06_01_2023_1129` mc 
        INNER JOIN `member_schemes_06_01_2023_1128` ms ON mc.id=ms.cand_id
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
        INNER JOIN duplicate_memberId_deactivated_by_DWO dd ON ms.`cand_id`=dd.cand_id
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='4' AND mc.application_ref_no  IN ('DAMCSY/2022/113628')"; 
		/* $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,
        mc.Memberid,lg.name AS dwo_name,application_date,`dwo_approve_date`,`dwo_approve_remarks`,
        md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,ms.cand_id,dd.`deactivated_date`
        FROM `medhavi_chhatra_06_01_2023_1129` mc 
        INNER JOIN `member_schemes_06_01_2023_1128` ms ON mc.id=ms.cand_id
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.`schemeID`='4' AND mc.application_ref_no ='DAMCSY/2022/91544'"; */

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusNavinikaran_deactivated()
    {
        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
        dm.`name` AS dname,sd.`distcode` AS saraldistcode,ms.`on_hold_remarks`,
        `on_hold_date`,ms.all_status,ms.cand_id,sd.dist_location_code AS dist_location_code,sd.distname AS distname 
        FROM `tbl_navinikaran_yojana_removed_apps` tny 
        INNER JOIN `member_schemes_removed_apps` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        WHERE  ms.schemeID='2' AND tny.Mobile !='' AND tny.`Application_Ref_No` IN ('DENOTIFIED/2023/200602')";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function get_b64_to_file_conversion_vivahshagun()
    {
        // $qry = "SELECT `marriageRegistrationId`,`Application_date`, `marriageCertificateLink`, 
        // `marriageCertificateAttachment` 
        // FROM `candidates_details`
        // WHERE `marriageRegistrationId`= '242441173844'";

        $qry = "SELECT `marriageRegistrationId`,`Application_date`, `marriageCertificateLink`, 
        `marriageCertificateAttachment` 
        FROM `candidates_details`
        WHERE Application_date > '2023-05-16' AND `marriageCertificateAttachment` !=''
        AND `marriageRegistrationId` NOT IN ('926921330486','408876021552','476851275174','242441173844')";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function update_b64_to_file_conversion_vivahshagun($id, $final_path)
    {
        $qry = "UPDATE `candidates_details`
        SET marriageCertificateAttachment = '$final_path'
        WHERE `marriageRegistrationId` = '$id'";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return TRUE;
        } else {
            return FALSE;
        } 
    }

    public function getStatusEdishaVivahShagunDisbursement(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
        CASE 
            WHEN cd.`beneficiaryName`='Groom'
            THEN cd.`groomMemberID`
            WHEN cd.`beneficiaryName` = 'Bride'
            THEN cd.`brideMemberId`
            WHEN cd.`beneficiaryName` = 'Bride Mother'
            THEN cd.`brideMotherMemberId`
            WHEN cd.`beneficiaryName` = 'Bride Father'
            THEN cd.`brideFatherMemberId`
            ELSE ''
            END AS memberId,
        CASE 
            WHEN cd.`beneficiaryName`='Groom'
            THEN cd.`groomFamilyId`
            WHEN cd.`beneficiaryName` = 'Bride'
            THEN cd.`brideFamilyId`
            WHEN cd.`beneficiaryName` = 'Bride Mother'
            THEN cd.`brideFamilyId`
            WHEN cd.`beneficiaryName` = 'Bride Father'
            THEN cd.`brideFamilyId`
            ELSE ''
            END AS familyId,
            cd.`beneficiaryName` as whom,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`,
            cd.schemeRegistrationId,cd.marriageRegistrationId, 'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate
        FROM candidates_details cd 
        INNER JOIN `member_schemes_vivah_shagun` ms ON cd.id=ms.cand_id
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode` 
        INNER JOIN vivah_sub_scheme ss ON ss.`sub_scheme_id` = cd.subSchemeCode
       --  INNER JOIN `vivah_amountmismatch` a ON a.marriageRegistrationId=cd.`marriageRegistrationId` 
        WHERE ms.all_status='7'
        AND cd.beneficiaryName IS NOT NULL
        AND ms.disbursement_api_response IS NULL
        AND ms.disbursement_date > '2024-06-10 13:37:30'
        -- Amount Mismatch --------- 
        -- AND ms.disbursement_api_response_failure LIKE '%Invalid amount%'        
        -- AND ms.disbursement = a.amount
        -- AND a.amount IS NOT NULL AND a.amount != '' AND a.amount != '4100'
        -- AND a.amount = '41000' 
        -- AND cd.`subSchemeCode` = '5'

        -- AND cand_id IN ('20682','20736','20753','20843','21529')
        -- AND ms.`disbursement_api_response_failure` IS NULL
      
        -- Generic Errors ---------
         -- AND ms.`disbursement_api_response_failure`='null'
         -- AND ms.disbursement_api_response_failure LIKE '%Invalid Member Id%'
        -- AND ms.disbursement_api_response_failure LIKE '%5jM4lW6jyJntD8LBwUw7n6WCWVsZT%'
        -- AND ms.disbursement_api_response_failure LIKE '%Scheme code does not match%'
        -- AND ms.disbursement_api_response_failure LIKE '%www.jhipster.tech%'
          AND ms.disbursement_api_response_failure LIKE '%Required fields is empty%'
        --  AND ms.disbursement_api_response_failure LIKE '%Scheme status is not valid%'

         AND ms.`disbursement_api_response_failure` NOT LIKE '%Scheme status already updated%'        
        -- AND cd.marriageRegistrationId IN ('861827065615')
        
        ";
        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunDisbursementDwo(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
        CASE 
            WHEN dwo.`BeneficiaryName` = cd.`groomName`
            THEN cd.`groomMemberID`
            WHEN dwo.`BeneficiaryName` = cd.`brideName`
            THEN cd.`brideMemberId`
            WHEN dwo.`BeneficiaryName` = cd.`brideMotherName`
            THEN cd.`brideMotherMemberId`
            WHEN dwo.`BeneficiaryName` = cd.`brideFatherName`
            THEN cd.`brideFatherMemberId`
            ELSE ''
            END AS memberId,
        CASE 
            WHEN dwo.`BeneficiaryName` = cd.`groomName`
            THEN 'Groom'
            WHEN dwo.`BeneficiaryName` = cd.`brideName`
            THEN 'Bride'
            WHEN dwo.`BeneficiaryName` = cd.`brideMotherName`
            THEN 'Bride Mother'
            WHEN dwo.`BeneficiaryName` = cd.`brideFatherName`
            THEN 'Bride Father'
            ELSE 'Not matched'
            END AS whom,
            dwo.`AccountNumber`,dwo.`FamilyID` AS familyId,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`,
            cd.schemeRegistrationId,cd.marriageRegistrationId, 'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate
        FROM `candidates_details` cd
        INNER JOIN `member_schemes_vivah_shagun` ms ON cd.id=ms.cand_id
        INNER JOIN `vivahshagun_disbursement_report_from_dwo_20d` dwo ON dwo.`RegistrationID`=cd.`marriageRegistrationId`
        -- INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        -- INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode` 
        WHERE ms.all_status='7'
        AND ms.disbursement_api_response IS NULL
        -- AND ms.`disbursement_api_response_failure` IS NULL 
        AND ms.`disbursement_api_response_failure` LIKE '%Scheme status is not valid%'";
        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function updateApiResponseVivahDisbursementSuccess($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set disbursement_api_response='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseVivahDisbursementFailure($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set disbursement_api_response_failure='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunReject(){


        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='6' 
        AND ms.dwo_rejected_date > '2023-09-18 13:37:30'
        AND dwo_rejected_api_response IS NULL
        -- AND dwo_rejected_api_response_failure IS NULL
          AND dwo_rejected_api_response_failure='null';
        -- AND dwo_rejected_api_response_failure LIKE '%No record found with scheme registration id.%'
        -- AND dwo_rejected_api_response_failure LIKE '%Scheme status is not valid%'
       --  AND dwo_rejected_api_response_failure LIKE '%Required fields is empty%'
        -- AND dwo_rejected_api_response_failure LIKE '%www.jhipster.tech%'
        -- AND dwo_rejected_api_response_failure LIKE '%5jM4lW6jyJntD8LBwUw7n6WCWVsZT%'
        -- AND cd.marriageRegistrationId IN ('737725191889')
        -- AND pushed_data IS NULL
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function updateApiResponseVivahRejectSuccess($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set dwo_rejected_api_response='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseVivahRejectFailure($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set dwo_rejected_api_response_failure='$response',
        pushed_data = '$pushed_data'
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunHold(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='4' 
        AND on_hold_api_response IS NULL
        -- AND on_hold_api_response_failure IS NULL
         AND on_hold_api_response_failure='null';
       --  AND on_hold_api_response_failure LIKE '%Scheme status is not valid%'
        -- AND cd.marriageRegistrationId IN ('965673309865' )
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function updateApiResponseVivahHoldSuccess($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set on_hold_api_response='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseVivahHoldFailure($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set on_hold_api_response_failure='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunApproved(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`, cd.Application_date as appliedDate
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='2' 
         AND ms.dwo_approve_api_response IS NULL
        -- AND dwo_approve_api_response_failure IS NULL
        --  AND dwo_approve_api_response_failure='null'
       -- AND dwo_approve_api_response_failure LIKE '%Scheme status is not valid%'
         AND dwo_approve_api_response_failure LIKE '%Required fields is empty like%'
        -- AND dwo_approve_api_response_failure LIKE '%www.jhipster.tech%'
        -- AND dwo_approve_api_response_failure LIKE '%zalando.github.io%'
        --  AND cd.marriageRegistrationId IN ('994762847929' )
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function updateApiResponseVivahApprovedSuccess($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set dwo_approve_api_response='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseVivahApprovedFailure($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set dwo_approve_api_response_failure='$response',
        pushed_data = '$pushed_data'
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunSanctioned(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`, cd.Application_date as appliedDate
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='3' 
        AND ms.app_sanction_api_response IS NULL
        -- AND app_sanction_api_response_failure IS NULL
           AND app_sanction_api_response_failure='null'
         --  AND app_sanction_api_response_failure LIKE '%Scheme status is not valid%'
         -- AND cd.marriageRegistrationId IN ('828869066065')
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function updateApiResponseVivahSanctionedSuccess($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set app_sanction_api_response='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseVivahSanctionedFailure($cand_id,$user_id,$status,$schemeID,$response,$pushed_data)
    {
        $qry = "update member_schemes_vivah_shagun set app_sanction_api_response_failure='$response',
        pushed_data = '$pushed_data' 
        where schemeID='$schemeID' and cand_id='$cand_id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function getStatusEdishaVivahShagunApprovedForSanctioned(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`dwo_approve_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Approved'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`, cd.Application_date as appliedDate
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='3' 
        AND ms.app_sanction_api_response IS NULL
        AND app_sanction_api_response_failure LIKE '%Scheme status is not valid%'
        --   AND cd.marriageRegistrationId IN ('165274502772')
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunApprovedforDisbursed(){
        error_reporting(1); 
        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.dwo_approve_date
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`dwo_approve_remarks`
            ELSE ''
            END AS actionremarks
        ,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Approved'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`,
            cd.schemeRegistrationId,cd.marriageRegistrationId, 'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate
            FROM `candidates_details` cd
            INNER JOIN `member_schemes_vivah_shagun` ms ON cd.id=ms.cand_id
            WHERE ms.all_status='7' AND cd.beneficiaryName IS NOT NULL
            AND ms.disbursement_api_response IS NULL
                AND ms.disbursement_api_response_failure LIKE '%Scheme status is not valid%'
            -- AND ms.disbursement_api_response_failure LIKE '%Invalid amount%'
            -- AND ms.`disbursement_api_response_failure` IS NULL
            -- AND cd.marriageRegistrationId IN ('983255946813')
        ";
        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunSanctionedforDisbursed(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.app_sanction_date
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`app_sanction_remarks`
            ELSE ''
            END AS actionremarks
        ,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Hold'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Sanctioned'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`,
            cd.schemeRegistrationId,cd.marriageRegistrationId, 'Welfare of SC & BC Department' AS source, cd.Application_date as appliedDate
        FROM `candidates_details` cd
        INNER JOIN `member_schemes_vivah_shagun` ms ON cd.id=ms.cand_id
        WHERE ms.all_status='7' AND cd.beneficiaryName IS NOT NULL 
        AND ms.disbursement_api_response IS NULL
        -- AND ms.`disbursement_api_response_failure` IS NULL
         -- AND ms.disbursement_api_response_failure LIKE '%Invalid amount%'
         -- AND cd.marriageRegistrationId IN ('165274502772')
         AND disbursement_api_response_failure LIKE '%Scheme status is not valid%'
        ";
        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getStatusEdishaVivahShagunApprovedForHold(){

        $qry = "SELECT 
        CASE
            WHEN ms.all_status='2'
            THEN ms.dwo_approve_date
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_date`
            WHEN ms.all_status='4'
            THEN ms.`dwo_approve_date`
            WHEN ms.all_status='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_date`
            ELSE ''
            END AS actiondate
        ,
        CASE
            WHEN ms.all_status='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.all_status='4'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`='Other'
            THEN ms.`dwo_reject_other_remarks`
            WHEN ms.all_status='6' AND ms.`dwo_reject_remarks`!='Other'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.all_status='7'
            THEN ms.`disbursement_remarks`
            ELSE ''
            END AS actionremarks
        ,ls.`scheme_name` AS optedscheme,vss.`scheme_name` AS vivahSubScheme,cd.schemeRegistrationId,cd.marriageRegistrationId,'Welfare of SC & BC Department' AS source,
        CASE
            WHEN ms.all_status='2'
            THEN 'Approved'
            WHEN ms.all_status='3'
            THEN 'Sanctioned'
            WHEN ms.all_status='4'
            THEN 'Approved'
            WHEN ms.all_status='6'
            THEN 'Rejected'
            WHEN ms.all_status='7'
            THEN 'Disbursement'
            ELSE ''
            END AS STATUS,
        CASE
            WHEN ms.all_status='7'
            THEN ms.`disbursement`
            ELSE ''
            END AS amount,
            ms.cand_id, ms.user_id, ms.all_status, cd.`schemeId` AS schemeCode, cd.`subSchemeCode`, cd.Application_date as appliedDate
         FROM `member_schemes_vivah_shagun` ms
        INNER JOIN `candidates_details` cd ON ms.`cand_id`=cd.id
        INNER JOIN `login_schemes` ls ON cd.`schemeId`=ls.`id`
        INNER JOIN `vivah_sub_scheme` vss ON vss.id=cd.`subSchemeCode`
        WHERE ms.all_status='4' 
        AND on_hold_api_response IS NULL
        -- AND on_hold_api_response_failure ='null'
         AND on_hold_api_response_failure LIKE '%Scheme status is not valid%'
          AND cd.marriageRegistrationId IN ('453407306710','976038298440')
        ";

        $query =  $this->db->query($qry); 
        // var_dump($query);
        // return $query->num_rows();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
	
	public function getStatusAntarjatiya_reject()
    {
        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,dwo_reject_remarks,`dwo_rejected_date`,md.dist_location_code AS dist_location_code,md.distname AS distname 
        FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE tay.`Saral_ID`='MMSASY/2023/00015' 
        AND ms.schemeID='3'";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusMedhaviReapply($saral_id = '')
    {
        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        // application_date, all_status, cand_id,rejection_remarks_two, `rejection_date_two`, sent_dwo_status_date, pending_api_response,
        // pending_pushed_data,md.distname,md.`dist_location_code`, ms.dwo_rejected_date
        // FROM medhavi_chhatra mc INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        // WHERE 
        // ms.all_status IN ('6') 
        // AND ms.schemeID='4'
        // AND mc.`application_date` IS NOT NULL AND mc.application_date !='' AND mc.application_date !='0000-00-00 00:00:00'
        // AND mc.application_ref_no IN ('DAMCSY/2023/61035')"; 

        $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        application_date, all_status, cand_id,rejection_remarks_two, `rejection_date_two`, sent_dwo_status_date, pending_api_response,
        pending_pushed_data,md.distname,md.`dist_location_code`,
        CASE
        WHEN ms.`all_status`='1'
        THEN ms.sent_dwo_status_date
        WHEN ms.`all_status`='2'
        THEN ms.`dwo_approve_date`
        WHEN ms.`all_status`='3'
        THEN ms.`app_sanction_date`
        WHEN ms.`all_status`='4'
        THEN ms.`on_hold_date`
        WHEN ms.`all_status`='5'
        THEN ms.rejection_date_two
        WHEN ms.`all_status`='6'
        THEN ms.dwo_rejected_date
        ELSE ''
        END AS ActionDate
        FROM medhavi_chhatra mc INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        WHERE 
        -- ms.all_status IN ('6') 
        ms.schemeID='4'
        AND mc.`application_date` IS NOT NULL AND mc.application_date !='' AND mc.application_date !='0000-00-00 00:00:00'
        AND mc.application_ref_no IN ('$saral_id')";

        // $qry = "SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        // Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,mc.FamilyID,mc.Memberid,l.name,
        // application_date, all_status, cand_id,rejection_remarks_two, `rejection_date_two`, sent_dwo_status_date, pending_api_response,
        // pending_pushed_data,md.distname,md.`dist_location_code`,
        // ms.user_resp_date AS ActionDate
        // FROM medhavi_chhatra mc INNER JOIN member_schemes_medhavi_chhatra ms ON mc.id=ms.cand_id
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname
        // WHERE 
        // -- ms.all_status IN ('6') 
        // ms.schemeID='4'
        // AND mc.`application_date` IS NOT NULL AND mc.application_date !='' AND mc.application_date !='0000-00-00 00:00:00'
        // AND mc.application_ref_no IN ('DAMCSY/2023/44830','DAMCSY/2023/44937')";

		/* $qry = " SELECT application_ref_no,currentDate,ApplicantName,Father_HusbandName,Gender,
        Permanentaddressofapplicant,MobileNumber,E_mail,District,md.distcode,tay.FamilyID,tay.Memberid,l.name,
        application_date, all_status, cand_id,rejection_remarks_two, `rejection_date_two`, sent_dwo_status_date, pending_api_response,
        pending_pushed_data,md.distname,md.`dist_location_code`, ms.dwo_rejected_date
         FROM `medhavi_chhatra` tay 
        INNER JOIN `member_schemes_medhavi_chhatra` ms ON tay.`id`=ms.`cand_id`
        LEFT JOIN login l ON l.id = ms.`user_id`
                INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE `application_ref_no` IN (SELECT `application_ref_no` FROM `medhavi_chhatra` WHERE application_ref_no NOT IN 
        (SELECT sid FROM `jhajjar_medhavi` )) AND PHASE='2' AND all_status='1' AND sent_dwo_status_date NOT LIKE 
        '%2023-09-04%'";*/
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusAntarjatiyaReapply($saral_id)
    {
        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        l.name,sent_dwo_status_date,rejection_date_two, all_status, cand_id, rejection_remarks_two,
        pending_api_response,pending_pushed_data,md.distname,md.`dist_location_code`,
        CASE
        WHEN ms.`all_status`='0'
        THEN tay.`application_Date`
        WHEN ms.`all_status`='1'
        THEN ms.sent_dwo_status_date
        WHEN ms.`all_status`='2'
        THEN ms.`dwo_approve_date`
        WHEN ms.`all_status`='3'
        THEN ms.`app_sanction_date`
        WHEN ms.`all_status`='4'
        THEN ms.`on_hold_date`
        WHEN ms.`all_status`='5'
        THEN ms.rejection_date_two
        WHEN ms.`all_status`='6'
        THEN ms.dwo_rejected_date
        ELSE ''
        END AS ActionDate
        FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE ms.schemeID='3'
        AND `Saral_ID` IN ('".$saral_id."')";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function getStatusNavinikaranReapply()
    {
        $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name`,dm.`name` AS dname,
        sd.`distcode` AS saraldistcode,ms.*,sd.dist_location_code AS dist_location_code,sd.distname AS distname,
        CASE
        WHEN ms.`all_status`='0'
        THEN tny.`date_of_application`
        WHEN ms.`all_status`='1'
        THEN ms.sent_dwo_status_date
        WHEN ms.`all_status`='2'
        THEN ms.`dwo_approve_date`
        WHEN ms.`all_status`='3'
        THEN ms.`app_sanction_date`
        WHEN ms.`all_status`='4'
        THEN ms.`on_hold_date`
        WHEN ms.`all_status`='5'
        THEN ms.rejection_date_two
        WHEN ms.`all_status`='6'
        THEN ms.dwo_rejected_date
        ELSE ''
        END AS ActionDate
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        LEFT JOIN login l ON l.id = ms.`user_id`
        INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        INNER join scbc_navi_nicdcodes s on s.cand_id = tny.id
        WHERE ms.`schemeID`='2'
        AND ms.all_status IN ('0') 
        AND s.all_status  IN ('0') 
        AND tny.`date_of_application` IS NOT NULL 
        AND tny.date_of_application !=''
        AND tny.date_of_application !='0000-00-00 00:00:00' 
        -- AND tny.`Application_Ref_No` IN ('DENOTIFIED/2023/142519')
        AND ms.pending_api_response IS NULL
        AND tny.n_phase IN ('3' )
        LIMIT 2000
        ";

        // $qry = "SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name`,dm.`name` AS dname,
        // sd.`distcode` AS saraldistcode,ms.*,sd.dist_location_code AS dist_location_code,sd.distname AS distname,
        // ms.user_resp_date AS ActionDate
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN `member_schemes` ms ON tny.id = ms.`cand_id` 
        // LEFT JOIN login l ON l.id = ms.`user_id`
        // INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE ms.`schemeID`='2' 
        // AND ms.all_status IN ('0') 
        // AND tny.`date_of_application` IS NOT NULL 
        // AND tny.date_of_application !=''
        // AND tny.date_of_application !='0000-00-00 00:00:00' 
        // AND tny.`Application_Ref_No` IN ('DENOTIFIED/2023/31042')";
		
        // 		$qry = "SELECT tny.id,tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
        // tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`, l.`name`,dm.`name` AS dname,sd.`distcode` AS saraldistcode,sd.dist_location_code AS dist_location_code,sd.distname AS distname
        // FROM `tbl_navinikaran_yojana` tny 
        // INNER JOIN member_schemes ms ON tny.`id`=ms.`cand_id`
        //  INNER JOIN login l ON tny.CTehsilMuniciple = l.`tcode`
        // INNER JOIN `district_master` dm ON tny.`District` = dm.`id`
        // INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
        // WHERE ms.`all_status`='0' AND tny.`date_of_application` < '2023-07-20 12:55:09' AND tny.`phase`='2'
        // AND ms.`schemeID`='2' AND l.status='1' AND l.name !='test' AND l.name !='Deendayal Singh'
        // AND tny.id BETWEEN 189060 AND 220720
        //  ORDER BY tny.id ASC";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseNavinikaran($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set pending_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatus_antarjatiya_Hold()
    {   
        
        
        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,
        // md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        // FROM `tbl_antarjayatia_yojna` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        // INNER JOIN login lg ON ms.user_id=lg.id
        // WHERE ms.schemeID='3' AND ms.all_status='4'
        // -- AND on_hold_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND on_hold_api_response LIKE '%You can send only 50000 Records in one day for one Application. Today Total Records are : 0%'
        // AND tay.`Saral_ID` IN ('MMSASY/2023/00039')"; 

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,on_hold_remarks,`on_hold_date`,
        md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE ms.schemeID='3' AND ms.all_status='4'
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.on_hold_date)
        AND DATE(ms.on_hold_date) < DATE(NOW())
        "; 

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatus_antarjatiya_Sanction()
    {
        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // lg.name AS dwo_name,`application_Date`,app_sanction_remarks,`app_sanction_date`,
        // md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        // FROM `tbl_antarjayatia_yojna` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        // INNER JOIN login lg ON ms.user_id=lg.id
        // WHERE ms.schemeID='3' AND ms.all_status='3'
        // AND app_sanction_api_response NOT LIKE '%STATUS_ID%:%000%'
        // -- AND tay.`Saral_ID`='MMSASY/2023/00170' 
        // ";

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,app_sanction_remarks,`app_sanction_date`,
        md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE ms.schemeID='3' AND ms.all_status='3'
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.app_sanction_date)
        AND DATE(ms.`app_sanction_date`) < DATE(NOW())
        -- AND ms.`app_sanction_api_response` IS NULL 
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatus_antarjatiya_Reject()
    {
        /*  $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,dwo_reject_remarks,`dwo_rejected_date`,
        md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        FROM `tbl_antarjayatia_yojna` tay
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE ms.schemeID='3' AND ms.all_status='6'
        AND dwo_rejected_api_response NOT LIKE '%STATUS_ID%:%000%'
        -- AND tay.`Saral_ID`='MMSASY/2023/00170' 
        "; */ 

        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // lg.name AS dwo_name,`application_Date`,dwo_reject_remarks,`dwo_rejected_date`,
        // md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        // FROM `tbl_antarjayatia_yojna_deleted_rejected_applications` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana_deleted_rejected_applications` ms ON tay.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        // LEFT JOIN login lg ON ms.user_id=lg.id
        // WHERE ms.schemeID='3' AND ms.all_status='6'
        // AND Saral_ID IN ('MMSASY/2023/00065')";

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,dwo_reject_remarks,`dwo_rejected_date`,
        md.dist_location_code AS dist_location_code,md.distname AS distname, ms.cand_id,ms.all_status
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        LEFT JOIN login lg ON ms.user_id=lg.id
        WHERE ms.schemeID='3' AND ms.all_status='6'
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.dwo_rejected_date)
        AND DATE(ms.dwo_rejected_date) < DATE(NOW())
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
	
	public function getStatus_antarjatiya_disbursement()
    {
        // $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        // `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        // lg.name AS dwo_name,`application_Date`,disbursement,disbursement_remarks,`disbursement_date`,md.dist_location_code AS dist_location_code,md.distname AS distname 
        // FROM `tbl_antarjayatia_yojna` tay
        // INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        // INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        // INNER JOIN login lg ON ms.user_id=lg.id
        // WHERE tay.`Saral_ID`='MMSASY/2023/00170' 
        // AND ms.schemeID='3'";

        $qry = "SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
        `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
        lg.name AS dwo_name,`application_Date`,disbursement,disbursement_remarks,`disbursement_date`,md.dist_location_code AS dist_location_code,md.distname AS distname 
        FROM `Under_Process_Antarjatiya_Total_25102023` sr
        INNER JOIN `tbl_antarjayatia_yojna` tay ON sr.ApplicationNumber=tay.`Saral_ID`
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id 
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
        INNER JOIN login lg ON ms.user_id=lg.id
        WHERE ms.all_status='7' 
        AND DATE(STR_TO_DATE(sr.LastActionDate,'%d/%m/%Y')) != DATE(ms.disbursement_date)
        AND DATE(ms.disbursement_date) < DATE(NOW())
        -- AND ms.disbursement_api_response IS NULL 
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatus_antarjatiya_oldportaldata()
    {
        
        $qry = "SELECT 
        `applicationStartDate` AS application_Date,sr.`NameofApplicant` AS ApplicantName, 
        sr.`MobileNo`,`DistrictName`,md.distcode, 
        `FileWithUser` AS dwo_name,
        `LocationName`,
        `LocationType`,
        rem.`PresentStatus` AS lastaction_remarks,

        CASE
        WHEN sr.`SARALID` = ''
        THEN sr.ApplicationNumber 
        ELSE sr.`SARALID`
        END AS SARALID, 

        CASE
        WHEN  rem.`PresentStatus` = 'Payment Disbursed'
        THEN 'A'
        WHEN  rem.`PresentStatus` = 'Rejected'
        THEN 'R'
        ELSE ''
        END AS Saral_Level, 

        CASE
        WHEN  rem.`PresentStatus` = 'Payment Disbursed'
        THEN 'If last step of application process is successfully executed and application forwarded to next step'
        WHEN  rem.`PresentStatus` = 'Rejected'
        THEN 'If Application is not feasible and there is no chances to deliver the service'
        ELSE ''
        END AS Saral_Desc,  
        rem.`LastActionDate2` AS lastaction_date,
        md.dist_location_code AS dist_location_code, md.distname AS distname  
        FROM `antarjatiya_oldportalonholddata_saralstatusupdate_5sep2024` sr 
        INNER JOIN `intercaste_oldportal_remaining` rem ON rem.Application_ref_no = sr.SaralID
        INNER JOIN tbl_saral_medhavi_district md ON sr.DistrictName=md.distname ";
        // --where  
        // -- statusupdate_api_response is NULL and statusupdate_date is NULL
        // --SaralID IN ( 'MMSASY/2022/00838','MMSASY/2022/00868','MMSASY/2022/00865','MMSASY/2020/00781','MMSASY/2021/01396','MMSASY/2021/01336' )
        // -- LIMIT 100
        
 
        //MMSASY/2022/01114 hit fail  
        //MMSASY/2022/01158 hit fail
         

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaOldPortalCases($ApplicationNumber,$response, $encodedArray)
    {
       echo $qry = "update antarjatiya_oldportalonholddata_saralstatusupdate_5sep2024 set  statusupdate_api_response='$response', pushed_data='$encodedArray',
        statusupdate_date= NOW()
        where ApplicationNumber = '$ApplicationNumber' OR SaralID='$ApplicationNumber'";    
       
        $q =  $this->db->query($qry);         
        if($q) {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getStatusOnSaralMedhavi_oldportaldata()
    {
        
        $qry = "SELECT 
        `application_start_date` AS application_Date,sr.`name_of_applicant` AS ApplicantName, 
        sr.`mobileNo` AS MobileNo, sr.district AS DistrictName,md.distcode, 
        `file_with_user` AS dwo_name,
        location_name AS `LocationName`,
        location_type AS `LocationType`,
        sr.`present_status` AS lastaction_remarks,

        CASE
        WHEN sr.`saral_id` = ''
        THEN sr.application_number 
        ELSE sr.`saral_id`
        END AS SARALID, 

        CASE
        WHEN  sr.`present_status` = 'Payment Disbursed'
        THEN 'A'
        WHEN  sr.`present_status` = 'Rejected'
        THEN 'R'
        ELSE ''
        END AS Saral_Level, 

        CASE
        WHEN  sr.`present_status` = 'Payment Disbursed'
        THEN 'If last step of application process is successfully executed and application forwarded to next step'
        WHEN  sr.`present_status` = 'Rejected'
        THEN 'If Application is not feasible and there is no chances to deliver the service'
        ELSE ''
        END AS Saral_Desc,  
        sr.`last_action_date2` AS lastaction_date,
        md.dist_location_code AS dist_location_code, md.distname AS distname  
        FROM `medhavi_olportal_cases_13dec24` sr  
        INNER JOIN tbl_saral_medhavi_district md ON sr.district = md.distname 
        WHERE sr.`last_action_date2` IS NOT NULL
        AND statusupdate_api_response IS NULL
        LIMIT 10000";
          
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviOldPortalCases($ApplicationNumber,$response, $encodedArray)
    {
       echo $qry = "update medhavi_olportal_cases_13dec24
        set  statusupdate_api_response='$response', pushed_data='$encodedArray',
        statusupdate_date= NOW()
        where application_number = '$ApplicationNumber' OR saral_id='$ApplicationNumber'";    
       
        $q =  $this->db->query($qry);         
        if($q) {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getStatus_antarjatiya_deactivate()
    {
         $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        FROM `antaryatiya_deactivated_on_saral` tay
        INNER JOIN tbl_saral_medhavi_district md ON tay.DistrictName=md.distname
        WHERE tay.`SARALID`='MMSASY/2023/00205'";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

   
    public function updateApiResponseAntarjatiyaDeactivate($ApplicationNumber,$response, $encodedArray)
    {
        $qry = "update antaryatiya_deactivated_on_saral set ApiResponse='$response', PushedData='$encodedArray',
        PushedDate= NOW()
        where ApplicationNumber='$ApplicationNumber'";    

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function checkJsonMedhavi_multiple($Application_ID,$Member_ID,$filename)
    {

        $qry1 = "SELECT * FROM medhavi_chhatra WHERE Memberid = '$Member_ID'";
        $qry2 =  $this->db->query($qry1);

        if ($qry2->result_id->num_rows > 0) {
        
            $select_query = "SELECT mc.*,
            CASE
            WHEN ms.`all_status`='1'
            THEN 'DWO Pending'
            WHEN ms.`all_status`='2'
            THEN 'Approved'
            WHEN ms.`all_status`='3'
            THEN 'Sanctioned'
            WHEN ms.`all_status`='4'
            THEN 'Hold'
            WHEN ms.`all_status`='5'
            THEN 'DWO Pending'
            WHEN ms.`all_status`='6'
            THEN 'Reject'
            WHEN ms.`all_status`='7'
            THEN 'Disbursement'
            WHEN ms.`all_status`='8'
            THEN 'Sentback'
            ELSE ''
            END AS Application_Status,
            CASE
            WHEN ms.`all_status`='1'
            THEN mc.`application_date`
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='5'
            THEN mc.`application_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            ELSE ''
            END AS Application_Status_Date
            FROM medhavi_chhatra mc
            INNER JOIN  `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
            WHERE mc.Memberid='$Member_ID' AND ms.schemeID='4'";
            $rec = $this->db->query($select_query);

            $existing_rec = $rec->result_array()[0];
        
            $existingApplicationID = $existing_rec['application_ref_no'];
            $existingApplicationStatus = $existing_rec['Application_Status'];
            $existingApplicationStatusDate = $existing_rec['Application_Status_Date'];

            $qr1 = "INSERT INTO `medhavi_checked_json` (`JsonFileName`, `ApplicationID`,`MemberID`,`ExsitingApplicationID`,`ApplicationStatus`,`ApplicationStatusDate`) VALUES ('$filename','$Application_ID','$Member_ID','$existingApplicationID','$existingApplicationStatus','$existingApplicationStatusDate')";

            $query1 =  $this->db->query($qr1);

            if($query1) {
                return 'success';                    
            } else {
                return 'failed';
            }           
        }else{

            $qr2 = "INSERT INTO `medhavi_checked_json` (`JsonFileName`, `ApplicationID`,`MemberID`,`ExsitingApplicationID`,`ApplicationStatus`) VALUES ('$filename','$Application_ID','$Member_ID','','')";

            $query2 =  $this->db->query($qr2);

            if($query2) {
                return 'success';                    
            } else {
                return 'failed';
            }  
        }        
    }

    public function checkJsonNavinikaran_multiple($Application_ID,$Member_ID,$filename)
    {

        $qry1 = "SELECT * FROM tbl_navinikaran_yojana WHERE memberID = '$Member_ID'";
        $qry2 =  $this->db->query($qry1);

        if ($qry2->result_id->num_rows > 0) {
        
            $select_query = "SELECT tny.*,
            CASE
            WHEN ms.`all_status`='0'
            THEN 'TWO Pending'
            WHEN ms.`all_status`='1'
            THEN 'DWO Pending'
            WHEN ms.`all_status`='2'
            THEN 'Approved'
            WHEN ms.`all_status`='3'
            THEN 'Sanctioned'
            WHEN ms.`all_status`='4'
            THEN 'Hold'
            WHEN ms.`all_status`='5'
            THEN 'DWO Pending'
            WHEN ms.`all_status`='6'
            THEN 'Reject'
            WHEN ms.`all_status`='7'
            THEN 'Disbursement'
            WHEN ms.`all_status`='8'
            THEN 'Sentback'
            ELSE ''
            END AS Application_Status
            FROM tbl_navinikaran_yojana tny
            INNER JOIN  `member_schemes` ms ON tny.id=ms.cand_id
            WHERE tny.memberID='$Member_ID' AND ms.schemeID='2'";
            $rec = $this->db->query($select_query);

            $existing_rec = $rec->result_array()[0];
        
            $existingApplicationID = $existing_rec['Application_Ref_No'];
            $existingApplicationStatus = $existing_rec['Application_Status'];

            $qr1 = "INSERT INTO `navinikaran_checked_json` (`JsonFileName`, `ApplicationID`,`MemberID`,`ExsitingApplicationID`,`ApplicationStatus`) VALUES ('$filename','$Application_ID','$Member_ID','$existingApplicationID','$existingApplicationStatus')";

            $query1 =  $this->db->query($qr1);

            if($query1) {
                return 'success';                    
            } else {
                return 'failed';
            }           
        }else{

            $qr2 = "INSERT INTO `navinikaran_checked_json` (`JsonFileName`, `ApplicationID`,`MemberID`,`ExsitingApplicationID`,`ApplicationStatus`) VALUES ('$filename','$Application_ID','$Member_ID','','')";

            $query2 =  $this->db->query($qr2);

            if($query2) {
                return 'success';                    
            } else {
                return 'failed';
            }  
        }        
    }

    public function checkStatusJsonNavinikaran_multiple($Application_ID,$Member_ID,$filename)
    {

        $qry1 = "SELECT * FROM tbl_navinikaran_yojana WHERE memberID = '$Member_ID'";
        $qry2 =  $this->db->query($qry1);

        if ($qry2->result_id->num_rows > 0) {

            $select_query = "SELECT *           
            FROM tbl_navinikaran_yojana tny
            INNER JOIN  `member_schemes` ms ON tny.id=ms.cand_id
            WHERE tny.memberID='$Member_ID' AND ms.schemeID='2' AND ms.all_status='6'";
            $rec = $this->db->query($select_query);

            // $existing_rec = $rec->result_array()[0];
        
        
            if($rec->result_id->num_rows > 0) {
                return 'update';                    
            } else {
                return 'Noupdate';
            }           
        }else{

            return "update";
        }        
    }
	
	public function send_to_saral_navinikarn_pending()
    {
        $qry = "SELECT tny.id,tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`, l.`name`,dm.`name` AS dname,sd.`distcode` AS saraldistcode,sd.dist_location_code AS dist_location_code,sd.distname AS distname
FROM `tbl_navinikaran_yojana` tny 
INNER JOIN member_schemes ms ON tny.`id`=ms.`cand_id`
 INNER JOIN login l ON tny.CTehsilMuniciple = l.`tcode`
INNER JOIN `district_master` dm ON tny.`District` = dm.`id`
INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
WHERE ms.`all_status`='0' AND tny.`date_of_application` < '2023-07-20 12:55:09' AND tny.`phase`='2'
AND ms.`schemeID`='2' AND l.status='1' AND l.name !='test' AND l.name !='Deendayal Singh'
AND tny.id BETWEEN 31772 AND 46703
 ORDER BY tny.id ASC
LIMIT 5000";
        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    function StatusChangeToAppliedNavinikaran($saral_id, $schmId)
    {
        echo " =$saral_id= ";
        
        $qry = "SELECT id FROM `tbl_navinikaran_yojana` WHERE Application_Ref_No='$saral_id'";
        $query1 = $this->db->query($qry);
        if ($query1) {
            $id = $query1->result_array()[0]["id"];

            if($id !=''){
                
                $chkQry = "SELECT * FROM member_schemes WHERE cand_id='$id' AND schemeID='$schmId'";
                $chkQryResult =  $this->db->query($chkQry);

                if($chkQryResult->result_id->num_rows > 0){
                    

                    $log_qr1 = "INSERT INTO `tbl_navinikaran_yojana_reapplied_applications` 
                    SELECT * FROM tbl_navinikaran_yojana WHERE `Application_Ref_No`='$saral_id'";

                    $log_qr1_result = $this->db->query($log_qr1);
                    if($log_qr1_result){
                        
                        $log_qr2 = "INSERT INTO `member_schemes_navinikaran_reapplied_applications` 
                        SELECT * FROM member_schemes WHERE cand_id= '$id' AND schemeID='$schmId'";

                        $log_qr2_result = $this->db->query($log_qr2);   
                        if($log_qr2_result){

                            $qry = "UPDATE `db_groom`.`member_schemes` 
                            SET
                            `all_status` = '0',
                            `dwo_approve_date` = NULL,`dwo_approve_api_response` = NULL,
                            `app_sanction_remarks` = NULL,`app_sanction_date` = NULL,`app_sanction_api_response` = NULL,`sanction_payment` = NULL,
                            `on_hold_remarks` = NULL,`on_hold_date` = NULL,`on_hold_api_response` = NULL,
                            `rejection_date_two` = NULL,`rejection_remarks_two` = NULL,
                            `dwo_rejected_date` = NULL,`dwo_reject_remarks` = NULL,`dwo_rejected_api_response` = NULL,
                            `disbursement` = NULL,`disbursement_remarks` = NULL,`disbursement_date` = NULL,`disbursement_api_response` = NULL,
                            `send_back_date` = NULL,`send_back_remarks` = NULL,`send_back_api_response` = NULL,`sent_sms_status` = NULL,
                            `two_approve_remarks` = NULL,`dwo_approve_remarks` = NULL,`user_api_response` = NULL,`user_resp_date` = NULL,
                            `pending_api_response` = NULL,`pending_pushed_data` = NULL,
                            `on_hold_remarks_after_sanction` = NULL,`on_hold_date_after_sanction` = NULL,`on_hold_api_response_after_sanction` = NULL,
                            `on_hold_remarks_after_sanction_input` = NULL 
                            WHERE `cand_id` = '$id' AND schemeID='$schmId'";
                            $q = $this->db->query($qry);

                            if ($q) {
                                // $cdate = date('Y-m-d h:i:s');
                                $dateQry = "UPDATE tbl_navinikaran_yojana SET reapplied_date= NOW()  WHERE `Application_Ref_No`='$saral_id'";

                                $dq = $this->db->query($dateQry);
                                if($dq){
                                    return 'statusUpdated';
                                }else{
                                    return false;
                                }
                                
                            } else {
                                return false;
                            }
                        }
                    }
                }else{
                    return "statusInvalid";
                }

            }else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    function StatusChangeToAppliedAntarjatiya($saral_id, $schmId)
    {
        echo " =$saral_id= ";
        
        $qry = "SELECT id FROM `tbl_antarjayatia_yojna` WHERE Saral_ID='$saral_id'";
        $query1 = $this->db->query($qry);
        if ($query1) {
            $id = $query1->result_array()[0]["id"];

            if($id !=''){
                
                $chkQry = "SELECT * FROM member_schemes_antarjayatia_yojana WHERE cand_id='$id' AND schemeID='$schmId'";
                $chkQryResult =  $this->db->query($chkQry);

                if($chkQryResult->result_id->num_rows > 0){
                    

                    $log_qr1 = "INSERT INTO tbl_antarjayatia_yojna_reapplied_applications
                    SELECT * FROM tbl_antarjayatia_yojna tny WHERE tny.`Saral_ID`='$saral_id'";

                    $log_qr1_result = $this->db->query($log_qr1);
                    if($log_qr1_result){
                        
                        $log_qr2 = "INSERT INTO `member_schemes_antarjayatia_yojana_reapplied_applications`
                        SELECT * FROM `member_schemes_antarjayatia_yojana` ms WHERE ms.cand_id= '$id' AND schemeID='$schmId'";

                        $log_qr2_result = $this->db->query($log_qr2);   
                        if($log_qr2_result){

                            $qry = "UPDATE `member_schemes_antarjayatia_yojana` ms
                            SET ms.`all_status`='0',ms.`dwo_approve_date`=NULL,`dwo_approve_api_response`=NULL,
                            `app_sanction_remarks`=NULL,`app_sanction_date`=NULL,`app_sanction_api_response`=NULL,`sanction_payment`=NULL,
                            `on_hold_remarks`=NULL,`on_hold_date`=NULL,`on_hold_api_response`=NULL,
                            `rejection_date_two`=NULL,`rejection_remarks_two`=NULL,
                            `dwo_rejected_date`=NULL,`dwo_reject_remarks`=NULL,`dwo_rejected_api_response`=NULL,
                            `disbursement`=NULL,`disbursement_remarks`=NULL,`disbursement_date`=NULL,`disbursement_api_response`=NULL,
                            `send_back_date`=NULL,`send_back_remarks`=NULL,`send_back_api_response`=NULL,
                            `two_approve_remarks`=NULL,`dwo_approve_remarks`=NULL,user_resp_date=NULL,sent_sms_status=NULL
                            WHERE ms.cand_id = '$id' AND schemeID='$schmId'";
                            $q = $this->db->query($qry);

                            if ($q) {
                                // $cdate = date('Y-m-d h:i:s');
                                $dateQry = "UPDATE tbl_antarjayatia_yojna SET reapplied_date= NOW()  WHERE `Saral_ID`='$saral_id'";

                                $dq = $this->db->query($dateQry);
                                if($dq){
                                    return 'statusUpdated';
                                }else{
                                    return false;
                                }
                                
                            } else {
                                return false;
                            }
                        }
                    }
                }else{
                    return "statusInvalid";
                }

            }else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    function StatusChangeToAppliedMedhavi($saral_id, $schmId)
    {
        
        $qry = "SELECT id FROM `medhavi_chhatra` WHERE application_ref_no='$saral_id'";
        $query1 = $this->db->query($qry);
        if ($query1) {
            $id = $query1->result_array()[0]["id"];

            if($id !=''){
                
                $chkQry = "SELECT * FROM member_schemes_medhavi_chhatra WHERE cand_id='$id' AND schemeID='$schmId'";
                $chkQryResult =  $this->db->query($chkQry);

                if($chkQryResult->result_id->num_rows > 0){
                    
                    $log_qr1 = "INSERT INTO medhavi_chhatra_reapplied_applications
                    SELECT * FROM medhavi_chhatra mc WHERE mc.application_ref_no='$saral_id'";

                    $log_qr1_result = $this->db->query($log_qr1);
                    if($log_qr1_result){
                        
                        $log_qr2 = "INSERT INTO `member_schemes_mc_reapplied_applications`
                        SELECT * FROM `member_schemes_medhavi_chhatra` ms WHERE cand_id= '$id' AND schemeID='$schmId'";

                        $log_qr2_result = $this->db->query($log_qr2);   
                        if($log_qr2_result){

                            $qry = "UPDATE member_schemes_medhavi_chhatra 
                            SET `all_status`='1',
                            `dwo_approve_date`=NULL,`dwo_approve_api_response`=NULL,`app_sanction_remarks`=NULL,
                            `app_sanction_date`=NULL,`app_sanction_api_response`=NULL,`sanction_payment`=NULL,
                            `on_hold_remarks`=NULL,`on_hold_date`=NULL,`on_hold_api_response`=NULL,`rejection_date_two`=NULL,`rejection_remarks_two`=NULL,
                            `dwo_rejected_date`=NULL,`dwo_reject_remarks`=NULL,`dwo_rejected_api_response`=NULL,
                            `disbursement`=NULL,`disbursement_remarks`=NULL,`disbursement_date`=NULL,`disbursement_api_response`=NULL,
                            `send_back_date`=NULL,`send_back_remarks`=NULL,`send_back_api_response`=NULL,`sent_sms_status`=NULL,
                            `two_approve_remarks`=NULL,`user_api_response`=NULL,`user_resp_date`=NULL,
                            `on_hold_remarks_after_sanction`=NULL,`on_hold_date_after_sanction`=NULL,`on_hold_api_response_after_sanction`=NULL,
                            `on_hold_remarks_after_sanction_input`=NULL 
                            WHERE `cand_id` = '$id' AND schemeID='$schmId'";
                            $q = $this->db->query($qry);

                            if ($q) {
                                // $cdate = date('Y-m-d h:i:s');
                                $dateQry = "UPDATE medhavi_chhatra SET reapplied_date= NOW() WHERE application_ref_no='$saral_id'";

                                $dq = $this->db->query($dateQry);
                                if($dq){
                                    return 'statusUpdated';
                                }else{
                                    return false;
                                }
                                
                            } else {
                                return false;
                            }
                        }
                    }
                }else{
                    return "statusInvalid";
                }

            }else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    function StatusChangeToAppliedVivah($mid, $schmId)
    {
        echo " =$mid= ";
        
        $qry = "SELECT id FROM `candidates_details` WHERE marriageRegistrationId='$mid'";
        $query1 = $this->db->query($qry);
        if ($query1) {
            $id = $query1->result_array()[0]["id"];

            if($id !=''){
                
                $chkQry = "SELECT * FROM member_schemes_vivah_shagun WHERE cand_id='$id' AND schemeID='$schmId'";
                $chkQryResult =  $this->db->query($chkQry);

                if($chkQryResult->result_id->num_rows > 0){
                    

                    $log_qr1 = "INSERT INTO candidates_details_reapplied_applications
                    SELECT * FROM candidates_details cd WHERE cd.marriageRegistrationId='$mid'";

                    $log_qr1_result = $this->db->query($log_qr1);
                    if($log_qr1_result){
                        
                        $log_qr2 = "INSERT INTO `member_schemes_vivah_shagun_reapplied_applications`
                        SELECT * FROM `member_schemes_vivah_shagun` ms WHERE ms.cand_id= '$id' AND schemeID='$schmId'";

                        $log_qr2_result = $this->db->query($log_qr2);   
                        if($log_qr2_result){

                            $qry = "UPDATE `member_schemes_vivah_shagun` ms
                            SET ms.`all_status`='0',ms.`dwo_approve_date`=NULL,`dwo_approve_api_response`=NULL,`dwo_approve_api_response_failure`=NULL,
                            `app_sanction_remarks`=NULL,`app_sanction_date`=NULL,`app_sanction_api_response`=NULL,`app_sanction_api_response_failure`=NULL,`sanction_payment`=NULL,
                            `on_hold_remarks`=NULL,`on_hold_date`=NULL,`on_hold_api_response`=NULL,`on_hold_api_response_failure`=NULL,
                            `rejection_date_two`=NULL,`rejection_remarks_two`=NULL,
                            `dwo_rejected_date`=NULL,`dwo_reject_remarks`=NULL,`dwo_reject_other_remarks`=NULL,`dwo_rejected_api_response`=NULL,`dwo_rejected_api_response_failure`=NULL,
                            `disbursement`=NULL,`disbursement_remarks`=NULL,`disbursement_date`=NULL,`disbursement_api_response`=NULL,`disbursement_api_response_failure`=NULL,
                            `send_back_date`=NULL,`send_back_remarks`=NULL,`send_back_api_response`=NULL,
                            `two_approve_remarks`=NULL,`dwo_approve_remarks`=NULL, pushed_data=NULL
                            WHERE ms.cand_id= '$id' AND schemeID='$schmId'";

                            $q = $this->db->query($qry);

                            if ($q) {
                                // $cdate = date('Y-m-d h:i:s');
                                $dateQry = "UPDATE candidates_details SET reapplied_date= NOW() WHERE marriageRegistrationId='$mid'";

                                $dq = $this->db->query($dateQry);
                                if($dq){
                                    return 'statusUpdated';
                                }else{
                                    return false;
                                }
                                
                            } else {
                                return false;
                            }
                        }
                    }
                }else{
                    return "statusInvalid";
                }

            }else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    public function getStatusAntarjatiyaDeactivateDuplicate()
    {
        $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        FROM `tbl_antarjayatia_yojna_deactivated_applications` tay
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE (tay.`deactivate_api_response`='' OR tay.`deactivate_api_response` IS NULL)
        AND tay.Saral_ID!=tay.duplicate_id";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function updateApiResponseAntarjatiyaDeactivateDuplicate($Saral_ID,$response, $encodedArray)
    {
        $qry = "update tbl_antarjayatia_yojna_deactivated_applications set deactivate_api_response='$response', 
        deactivate_data_pushed='$encodedArray', deactivate_date= NOW()
        where Saral_ID='$Saral_ID'";    

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getStatusMedhaviDeactivateDuplicate()
    {
        $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        FROM `medhavi_chhatra_deactivated_applications` tay
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE (tay.`deactivate_api_response`='' OR tay.`deactivate_api_response` IS NULL)
        AND application_ref_no!=duplicate_id
        -- AND application_ref_no>duplicate_id
        -- AND application_ref_no IN ('DAMCSY/2023/73611')
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
    

    public function updateApiResponseMedhaviDeactivateDuplicate($Saral_ID,$response, $encodedArray)
    {
        $qry = "update medhavi_chhatra_deactivated_applications set deactivate_api_response='$response', 
        deactivate_data_pushed='$encodedArray', deactivate_date= NOW()
        where application_ref_no='$Saral_ID'";    

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

   

    public function getStatusMedhaviDeactivateDuplicateRandom()
    {
        // $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        //         FROM `medhavi_chhatra_bk_29aug_24` tay 
        //         INNER JOIN member_schemes_medhavi_chhatra_bk_29aug_24 ms ON tay.id = ms.cand_id
        //         INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        //         WHERE -- (tay.`deactivate_api_response`='' OR tay.`deactivate_api_response` IS NULL) AND
        //         -- application_ref_no != duplicate_id AND
        //         -- AND application_ref_no > duplicate_id
        //         application_ref_no IN ('DAMCSY/2024/24982') ";
        //         //application_ref_no IN ('DAMCSY/2024/29178','DAMCSY/2024/33108','DAMCSY/2024/42359') ";

        $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
                FROM `medhavi_chhatra_duplicate_memberid_entries_deleted_6nov24` tay 
                INNER JOIN member_schemes_medhavi_duplicate_memberid_deleted_6nov24 ms ON tay.id = ms.cand_id
                INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
                 WHERE  (ms.`deactivate_api_response`='' OR ms.`deactivate_api_response` IS NULL)  
                -- application_ref_no != duplicate_id AND
                -- AND application_ref_no > duplicate_id
                 application_ref_no IN ('DAMCSY/2024/29178','DAMCSY/2024/33108','DAMCSY/2024/42359')
                ";


        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseMedhaviDeactivateDuplicateRandom($Saral_ID,$response, $encodedArray)
    {
         $qry = "update member_schemes_medhavi_duplicate_memberid_deleted_6nov24 ms
        inner join medhavi_chhatra_duplicate_memberid_entries_deleted_6nov24 m on m.id = ms.cand_id
        set ms.deactivate_api_response='$response', 
        ms.deactivate_data_pushed='$encodedArray', ms.deactivate_date= NOW() 
        where application_ref_no='$Saral_ID'";    

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getStatusAntarjatiyaDeactivateToCurrent()
    {
        $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        FROM `tbl_antarjayatia_yojna_deactivated_applications` tay
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname
        WHERE (tay.`deactivate_api_response`='' OR tay.`deactivate_api_response` IS NULL)
        AND tay.Saral_ID!=tay.duplicate_id";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function getStatusAntarjatiyaDeactivateWrongServiceCode()
    {
        $qry = "SELECT tay.* ,md.dist_location_code AS dist_location_code,md.distname AS distname, md.distcode
        FROM `AntarjatiyaDeactivatedWithWrongServiceCode_12_10_2023` td
        INNER JOIN tbl_antarjayatia_yojna tay ON td.SARALID=tay.Saral_ID
        INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseAntarjatiyaDeactivateWrongServiceCode($Saral_ID,$response, $encodedArray)
    {
        $qry = "update AntarjatiyaDeactivatedWithWrongServiceCode_12_10_2023 set Deactivate_api_response='$response', 
        Deactivate_pushed_data='$encodedArray'
        where SARALID='$Saral_ID'";    

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    function ResetPasswordCitizen($mid, $schmId)
    {
        
        $qry = "SELECT * FROM `citizen_login` WHERE applicationId='$mid'";
        $query1 = $this->db->query($qry);

        if ($query1) {
            
            $chkQry = "UPDATE citizen_login SET password='123456', status='0' WHERE applicationId='$mid'";
            $chkQryResult =  $this->db->query($chkQry);
           
            if($chkQryResult){
                return 'statusUpdated';
            }else{
                return false;
            }
            
        } else {
            return false;
        }
    }
    

    public function testFunction($subScheme){

		$qry = $this->db->query("select amount from vivah_sub_scheme where sub_scheme_id='$subScheme'");

        if($qry){
            return $qry->result_array()['0']['amount'];
        }
	}

    public function getSchemeAmount($id){

		$qry = $this->db->query("SELECT vss.amount FROM `candidates_details` cd 
        INNER JOIN `member_schemes_vivah_shagun` ms ON cd.id=ms.cand_id 
        INNER JOIN `vivah_sub_scheme` vss ON cd.subSchemeCode=vss.`sub_scheme_id`
        WHERE cd.id='$id'");

        if($qry){
            return $qry->result_array()['0']['amount'];
        }else{
            return FALSE;
        }
	}

    public function getStatusOnSaralAntarjatiya_Cron()
    {
        $qry = "SELECT * FROM(

            SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
            `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
            lg.name AS dwo_name,disbursement,ms.cand_id,
            md.dist_location_code AS dist_location_code,md.distname AS distname, ms.all_status,
            CASE
            WHEN ms.`all_status`='0'
            THEN tay.`application_Date`
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            ELSE ''
            END AS Last_Action_Date, 
            CASE
            WHEN ms.`all_status`='0'
            THEN 'Application Submitted'
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_remarks`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_remarks`
            ELSE ''
            END AS Last_Action_Remarks,
            CASE
            WHEN ms.`all_status`='0'
            THEN ms.`pending_api_response`
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_api_response`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_api_response`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_api_response`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_api_response`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_api_response`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_api_response`
            ELSE ''
            END AS Last_Action_Api_Response,
            CASE
            WHEN ms.`all_status`='0'
            THEN '1'
            WHEN ms.`all_status`='2'
            THEN '6'
            WHEN ms.`all_status`='3'
            THEN '8'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
            WHEN ms.`all_status`='6'
            THEN '10'
            WHEN ms.`all_status`='7'
            THEN '10'
            WHEN ms.`all_status`='8'
            THEN '1'
            ELSE ''
            END AS Saral_Level,
            CASE
            WHEN ms.`all_status`='0'
            THEN 'E'
            WHEN ms.`all_status`='2'
            THEN 'A'
            WHEN ms.`all_status`='3'
            THEN 'A'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
            WHEN ms.`all_status`='6'
            THEN 'R'
            WHEN ms.`all_status`='7'
            THEN 'A'
            WHEN ms.`all_status`='8'
            THEN 'H'
            ELSE ''
            END AS Saral_Last_Action,
            CASE
            WHEN ms.`all_status`='0'
            THEN 'Application Submission'
            WHEN ms.`all_status`='2'
            THEN 'Case Approval'
            WHEN ms.`all_status`='3'
            THEN 'Raise EPS'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
            WHEN ms.`all_status`='6'
            THEN 'Delivery'
            WHEN ms.`all_status`='7'
            THEN 'Delivery'
            WHEN ms.`all_status`='8'
            THEN 'Application Submission'
            ELSE ''
            END AS Saral_Last_Action_Desc
            FROM `tbl_antarjayatia_yojna` tay 
            INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id
            INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
            LEFT JOIN login lg ON ms.user_id=lg.id
            ) p
            WHERE 
            -- DATE(Last_Action_Date) >= '2023-11-08' and DATE(Last_Action_Date)!= DATE(NOW())
            DATE(Last_Action_Date) = '2023-11-20'
            -- DATE(Last_Action_Date)= DATE(NOW())
            AND (Last_Action_Api_Response IS NULL 
            OR Last_Action_Api_Response NOT LIKE '%Success%')
            ";
    
        $query1 =  $this->db->query($qry);  

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    function updateApiResponseonAntarjatiya_Cron($id,$status,$schemeID,$response,$encodedArray)
    {
        if($status=='0'){

            $qry = "update member_schemes_antarjayatia_yojana set pending_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='2'){

            $qry = "update member_schemes_antarjayatia_yojana set dwo_approve_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='3'){

            $qry = "update member_schemes_antarjayatia_yojana set app_sanction_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='4'){

            $qry = "update member_schemes_antarjayatia_yojana set on_hold_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='6'){

            $qry = "update member_schemes_antarjayatia_yojana set dwo_rejected_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='7'){

            $qry = "update member_schemes_antarjayatia_yojana set disbursement_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='8'){

            $qry = "update member_schemes_antarjayatia_yojana set send_back_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
               
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusOnSaralMedhavi_Cron()
    {
        $qry = "SELECT * FROM(

            SELECT application_ref_no, currentDate, ApplicantName, Father_HusbandName, Gender,
            Permanentaddressofapplicant, MobileNumber, E_mail, District, md.distcode, mc.FamilyID, mc.Memberid,
            lg.name as dwo_name,application_date,disbursement,ms.cand_id,
            md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status,
            CASE
            WHEN ms.`all_status`='1'
            THEN mc.`application_date`
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            ELSE ''
            END AS Last_Action_Date, 
            CASE
            WHEN ms.`all_status`='1'
            THEN ''
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_remarks`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_remarks`
            ELSE ''
            END AS Last_Action_Remarks,
            CASE
            WHEN ms.`all_status`='1'
            THEN ms.`pending_api_response`
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_api_response`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_api_response`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_api_response`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_api_response`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_api_response`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_api_response`
            ELSE ''
            END AS Last_Action_Api_Response,
            CASE
            WHEN ms.`all_status`='1'
            THEN '1'
            WHEN ms.`all_status`='2'
            THEN '4'
            WHEN ms.`all_status`='3'
            THEN '8'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
            WHEN ms.`all_status`='6'
            THEN '10'
            WHEN ms.`all_status`='7'
            THEN '10'
            WHEN ms.`all_status`='8'
            THEN '1'
            ELSE ''
            END AS Saral_Level,
            CASE
            WHEN ms.`all_status`='1'
            THEN 'E'
            WHEN ms.`all_status`='2'
            THEN 'A'
            WHEN ms.`all_status`='3'
            THEN 'A'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
            WHEN ms.`all_status`='6'
            THEN 'R'
            WHEN ms.`all_status`='7'
            THEN 'A'
            WHEN ms.`all_status`='8'
            THEN 'H'
            ELSE ''
            END AS Saral_Last_Action,
            CASE
            WHEN ms.`all_status`='1'
            THEN 'Application Submission'
            WHEN ms.`all_status`='2'
            THEN 'Document Verification and Case Approval'
            WHEN ms.`all_status`='3'
            THEN 'Raise EPS'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
            WHEN ms.`all_status`='6'
            THEN 'Delivery'
            WHEN ms.`all_status`='7'
            THEN 'Delivery'
            WHEN ms.`all_status`='8'
            THEN 'Application Submission'
            ELSE ''
            END AS Saral_Last_Action_Desc
            FROM `medhavi_chhatra` mc 
            INNER JOIN `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
            INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
            LEFT JOIN login lg ON ms.user_id=lg.id
            
            ) p
            WHERE 
            -- DATE(Last_Action_Date) >= '2023-11-08' AND DATE(Last_Action_Date)!= DATE(NOW())
            DATE(Last_Action_Date) = '2023-11-15'
            -- DATE(Last_Action_Date) = DATE(NOW())
            AND (Last_Action_Api_Response IS NULL 
            OR Last_Action_Api_Response NOT LIKE '%Success%')";
    
        $query1 =  $this->db->query($qry);  

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    function updateApiResponseonMedhavi_Cron($id,$status,$schemeID,$response,$encodedArray)
    {
        if($status=='1'){

            $qry = "update member_schemes_medhavi_chhatra set pending_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='2'){

            $qry = "update member_schemes_medhavi_chhatra set dwo_approve_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='3'){

            $qry = "update member_schemes_medhavi_chhatra set app_sanction_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='4'){

            $qry = "update member_schemes_medhavi_chhatra set on_hold_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='6'){

            $qry = "update member_schemes_medhavi_chhatra set dwo_rejected_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='7'){

            $qry = "update member_schemes_medhavi_chhatra set disbursement_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='8'){

            $qry = "update member_schemes_medhavi_chhatra set send_back_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
               
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusOnSaralNavinikaran_PreviousDay_Cron()
    {
        $qry = "SELECT * FROM(

            SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
                    tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
                    dm.`name` AS dname,sd.`distcode` AS saraldistcode, ms.all_status,ms.cand_id,
                    sd.dist_location_code AS dist_location_code,sd.distname AS distname,ms.disbursement,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, tny.date_of_application, ms.`user_resp_date`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`dwo_approve_date`
                    WHEN ms.`all_status`='3'
                    THEN ms.`app_sanction_date`
                    WHEN ms.`all_status`='4'
                    THEN ms.`on_hold_date`
                    WHEN ms.`all_status`='6'
                    THEN ms.`dwo_rejected_date`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_date`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_date`
                    WHEN ms.`all_status`='9'
                    THEN ms.`on_hold_date_after_sanction`
                    WHEN ms.`all_status`='10'
                    THEN ms.`on_hold_date_after_approval`
                    WHEN ms.`all_status`='11'
                    THEN ms.`on_hold_date_after_rta`
                    WHEN ms.`all_status`='12'
                    THEN ms.`on_hold_date_after_rtr`
                    ELSE ''
                    END AS Last_Action_Date, 
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submitted'
                    WHEN ms.`all_status`='2'
                    THEN ms.`dwo_approve_remarks`
                    WHEN ms.`all_status`='3'
                    THEN ms.`app_sanction_remarks`
                    WHEN ms.`all_status`='4'
                    THEN ms.`on_hold_remarks`
                    WHEN ms.`all_status`='6'
                    THEN ms.`dwo_reject_remarks`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_remarks`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_remarks`
                    WHEN ms.`all_status`='9'
                    THEN 'Hold after Sanction by DWO'
                    WHEN ms.`all_status`='10'
                    THEN 'Hold after Approval by DWO'
                    WHEN ms.`all_status`='11'
                    THEN 'Hold for DWO Pending by DWO'
                    WHEN ms.`all_status`='12'
                    THEN 'Hold for DWO Pending by DWO'
                    ELSE ''
                    END AS Last_Action_Remarks,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`dwo_approve_api_response`
                    WHEN ms.`all_status`='3'
                    THEN ms.`app_sanction_api_response`
                    WHEN ms.`all_status`='4'
                    THEN ms.`on_hold_api_response`
                    WHEN ms.`all_status`='6'
                    THEN ms.`dwo_rejected_api_response`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_api_response`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_api_response`
                    WHEN ms.`all_status`='9'
                    THEN ms.`on_hold_api_response_after_sanction`
                    WHEN ms.`all_status`='10'
                    THEN ms.`on_hold_api_response_after_approval`
                    WHEN ms.`all_status`='11'
                    THEN ms.`on_hold_api_response_after_rta`
                    WHEN ms.`all_status`='12'
                    THEN ms.`on_hold_api_response_after_rtr`
                    ELSE ''
                    END AS Last_Action_Api_Response,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN '1'
                    WHEN ms.`all_status`='2'
                    THEN '6'
                    WHEN ms.`all_status`='3'
                    THEN '8'
                    WHEN ms.`all_status`='4'
                    THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
                    WHEN ms.`all_status`='6'
                    THEN '10'
                    WHEN ms.`all_status`='7'
                    THEN '10'
                    WHEN ms.`all_status`='8'
                    THEN '1'
                    WHEN ms.`all_status`='9'
                    THEN '8'
                    WHEN ms.`all_status`='10'
                    THEN '6'
                    WHEN ms.`all_status`='11'
                    THEN '3'
                    WHEN ms.`all_status`='12'
                    THEN '3'
                    ELSE ''
                    END AS Saral_Level,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'E'
                    WHEN ms.`all_status`='2'
                    THEN 'A'
                    WHEN ms.`all_status`='3'
                    THEN 'A'
                    WHEN ms.`all_status`='4'
                    THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
                    WHEN ms.`all_status`='6'
                    THEN 'R'
                    WHEN ms.`all_status`='7'
                    THEN 'A'
                    WHEN ms.`all_status`='8'
                    THEN 'H'
                    WHEN ms.`all_status`='9'
                    THEN 'H'
                    WHEN ms.`all_status`='10'
                    THEN 'H'
                    WHEN ms.`all_status`='11'
                    THEN 'H'
                    WHEN ms.`all_status`='12'
                    THEN 'H'
                    ELSE ''
                    END AS Saral_Last_Action,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submission'
                    WHEN ms.`all_status`='2'
                    THEN 'Case Approval'
                    WHEN ms.`all_status`='3'
                    THEN 'Raise EPS'
                    WHEN ms.`all_status`='4'
                    THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
                    WHEN ms.`all_status`='6'
                    THEN 'Delivery'
                    WHEN ms.`all_status`='7'
                    THEN 'Delivery'
                    WHEN ms.`all_status`='8'
                    THEN 'Application Submission'
                    WHEN ms.`all_status`='9'
                    THEN 'Raise EPS'
                    WHEN ms.`all_status`='10'
                    THEN 'Case Approval'
                    WHEN ms.`all_status`='11'
                    THEN 'Document Verification'
                    WHEN ms.`all_status`='12'
                    THEN 'Document Verification'
                    ELSE ''
                    END AS Saral_Last_Action_Desc,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
                    ELSE ''
                    END AS Last_Action_type,
                    ms.cron_push_date
            FROM `tbl_navinikaran_yojana` tny 
            INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
            LEFT JOIN login l ON l.id = ms.`user_id`
            INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
            INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
            
            ) p
            WHERE 
            -- DATE(Last_Action_Date) >= '2023-11-03' AND DATE(Last_Action_Date) != DATE(NOW())
            DATE(Last_Action_Date) = '2023-11-06'
            -- DATE(Last_Action_Date) = DATE(NOW())
            -- AND (Last_Action_Api_Response IS NULL 
            -- OR Last_Action_Api_Response NOT LIKE '%Success%')
            ";

        $query1 =  $this->db->query($qry);

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseNavinikaran_PreviousDay_Cron($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type)
    {
        if($status=='0' && $Last_Action_type == 'freshApplied'){

            $qry = "update member_schemes set applied_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='0' && $Last_Action_type == 'userApplied'){

            $qry = "update member_schemes set user_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='2'){

            $qry = "update member_schemes set dwo_approve_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='3'){

            $qry = "update member_schemes set app_sanction_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='4'){

            $qry = "update member_schemes set on_hold_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='6'){

            $qry = "update member_schemes set dwo_rejected_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='7'){

            $qry = "update member_schemes set disbursement_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='8'){

            $qry = "update member_schemes set send_back_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='9'){

            $qry = "update member_schemes set on_hold_api_response_after_sanction='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='10'){

            $qry = "update member_schemes set on_hold_api_response_after_approval='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='11'){

            $qry = "update member_schemes set on_hold_api_response_after_rta='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='12'){

            $qry = "update member_schemes set on_hold_api_response_after_rtr='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
                 
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getStatusOnSaralNavinikaran_Cron()
    {
        $qry = "SELECT * FROM(

            SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
                    tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  dwo_name,
                    dm.`name` AS dname,sd.`distcode` AS saraldistcode, ms.all_status,ms.cand_id,
                    sd.dist_location_code AS dist_location_code,sd.distname AS distname,ms.disbursement,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, tny.date_of_application, ms.`user_resp_date`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            WHEN ms.`all_status`='9'
            THEN ms.`on_hold_date_after_sanction`
            WHEN ms.`all_status`='10'
            THEN ms.`on_hold_date_after_approval`
            WHEN ms.`all_status`='11'
            THEN ms.`on_hold_date_after_rta`
            WHEN ms.`all_status`='12'
            THEN ms.`on_hold_date_after_rtr`
            ELSE ''
            END AS Last_Action_Date, 
            CASE
            WHEN ms.`all_status`='0'
            THEN 'Application Submitted'
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_remarks`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_remarks`
            WHEN ms.`all_status`='9'
            THEN ms.`on_hold_remarks_after_sanction`
            WHEN ms.`all_status`='10'
            THEN ms.`on_hold_remarks_after_approval`
            WHEN ms.`all_status`='11'
            THEN ms.`on_hold_remarks_after_rta`
            WHEN ms.`all_status`='12'
            THEN ms.`on_hold_remarks_after_rtr`
            ELSE ''
            END AS Last_Action_Remarks,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_api_response`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_api_response`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_api_response`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_api_response`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_api_response`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_api_response`
            WHEN ms.`all_status`='9'
            THEN ms.`on_hold_api_response_after_sanction`
            WHEN ms.`all_status`='10'
            THEN ms.`on_hold_api_response_after_approval`
            WHEN ms.`all_status`='11'
            THEN ms.`on_hold_api_response_after_rta`
            WHEN ms.`all_status`='12'
            THEN ms.`on_hold_api_response_after_rtr`
            ELSE ''
            END AS Last_Action_Api_Response,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
            ELSE ''
            END AS Last_Action_type
            FROM `tbl_navinikaran_yojana` tny 
            INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
            LEFT JOIN login l ON l.id = ms.`user_id`
            INNER JOIN `district_master` dm ON dm.`id` = tny.`District`
            INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`distname`=dm.`name`
            
            ) p
            WHERE 
            -- DATE(Last_Action_Date) >= '2023-11-03' AND DATE(Last_Action_Date) != DATE(NOW())
            DATE(Last_Action_Date) = '2023-11-20'
            -- DATE(Last_Action_Date) = DATE(NOW())
            AND (Last_Action_Api_Response IS NULL 
            OR Last_Action_Api_Response NOT LIKE '%Success%')";

        $query1 =  $this->db->query($qry);

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseNavinikaranPending($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type)
    {
        if($status=='0' && $Last_Action_type == 'freshApplied'){

            $qry = "update member_schemes set applied_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='0' && $Last_Action_type == 'userApplied'){

            $qry = "update member_schemes set user_api_response='$response', pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateApiResponseNavinikaranSanction($id,$status,$schemeID,$response, $encodedArray)
    {
        $qry = "update member_schemes set app_sanction_api_response='$response', pending_pushed_data='$encodedArray' 
        where schemeID='$schemeID' and cand_id='$id' and all_status='$status'";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    

    function getUserDetail($userType){

        $qry = "SELECT UserID, password FROM `tbl_PPPDW_login` WHERE TYPE='$userType' AND STATUS='1'";

        $q = $this->db->query($qry);

        if($q){
            return $q->result_array()[0];
        }else{
            return false;
        }
    }

    function updateTokenPPPDW($userId, $token){

        $qry = "UPDATE `tbl_PPPDW_login` SET token='$token', tokenDate=NOW() WHERE UserID='$userId'";

        $q = $this->db->query($qry);

        if($q){
            return true;
        }else{
            return false;
        }
    }

    function getTokenPPPDW($userType){

        $qry = "SELECT token FROM `tbl_PPPDW_login` WHERE TYPE='$userType' AND STATUS='1'";

        $q = $this->db->query($qry);

        if($q){
            return $q->result_array()[0];
        }else{
            return false;
        }
    }

    public function getDataPPPDW_Navinikaran()
    {
        $qry = "SELECT `Application_Ref_No`,`familyID`,`memberID`,`Nameofapplicant`,`date_of_application`,dm.`name` AS `District`,s.scheme_name,s.dept_name,
        ms.`dwo_approve_date`,ms.`disbursement_date`,`disbursement`,ms.`cand_id`
        FROM `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
        INNER JOIN `login_schemes` s ON s.id=ms.schemeID
        LEFT JOIN  `district_master` dm ON dm.`id`=tny.`District`
        WHERE ms.all_status = '7' 
        AND (disbursement_date!='' AND disbursement_date IS NOT NULL)
        AND (disbursement!='' AND disbursement IS NOT NULL AND disbursement !='0')
        AND (familyID !='' AND familyID IS NOT NULL)
        AND (memberID!='' AND memberID IS NOT NULL)
        AND (District!='' AND District IS NOT NULL) 
        -- AND (pppdw_api_response IS NULL OR pppdw_api_response LIKE '%Failed%')
        AND (pppdw_api_response IS NULL OR pppdw_api_response NOT LIKE '%Succesfull%')
        LIMIT 2";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponsePPPDW_Navinikaran($ApplicationID,$encodedPushedData,$response)
    {
        // $qry = "update member_schemes set pppdw_api_response='$response', 
        // pppdw_pushed_data='$encodedArray', pppdw_pushed_date= NOW()
        // where cand_id='$cand_id'";    

        // $qry = "update member_schemes set pppdw_pushed_date= NOW()
        // where cand_id IN ($candIdString)";

        $qry = "update `tbl_navinikaran_yojana` tny 
        INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id 
        set pppdw_api_response='$response', pppdw_pushed_data='$encodedPushedData', pppdw_pushed_date= NOW()
        where Application_Ref_No = '$ApplicationID'";

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }


    public function getDataPPPDW_Antarjatiya()
    {
        $qry = "SELECT `Saral_ID`,`familyID`,`memberID`,`ApplicantName`,`application_Date`,`District`,s.scheme_name,s.dept_name,
        ms.`dwo_approve_date`,ms.`disbursement_date`,`disbursement`,ms.`cand_id`
        FROM `tbl_antarjayatia_yojna` tay 
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.`cand_id`
        INNER JOIN `login_schemes` s ON s.id=ms.schemeID
        WHERE ms.all_status = '7'
        AND (disbursement_date!='' AND disbursement_date IS NOT NULL)
        AND (disbursement!='' AND disbursement IS NOT NULL AND disbursement !='0')
        AND (familyID !='' AND familyID IS NOT NULL)
        AND (memberID!='' AND memberID IS NOT NULL)
        AND (District!='' AND District IS NOT NULL) 
        -- AND (pppdw_api_response IS NULL OR pppdw_api_response LIKE '%Failed%')
        AND (pppdw_api_response IS NULL OR pppdw_api_response NOT LIKE '%Succesfull%')
        LIMIT 2";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponsePPPDW_Antarjatiya($ApplicationID,$encodedPushedData,$response)
    {
        // $qry = "update member_schemes_antarjayatia_yojana set pppdw_api_response='$response', 
        // pppdw_pushed_data='$encodedArray', pppdw_pushed_date= NOW()
        // where cand_id='$cand_id'";    

        $qry = "update `tbl_antarjayatia_yojna` tay 
        INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.`cand_id` 
        set pppdw_api_response='$response', pppdw_pushed_data='$encodedPushedData', pppdw_pushed_date= NOW()
        where tay.Saral_ID = '$ApplicationID'";

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }

    public function getDataPPPDW_Medhavi()
    {
        $qry = "SELECT `application_ref_no`,`FamilyID`,`Memberid`,`ApplicantName`,`application_date`,`District`,s.scheme_name,s.dept_name,
        ms.`dwo_approve_date`,ms.`disbursement_date`,`disbursement`,ms.`cand_id`
        FROM `medhavi_chhatra` mc
	    INNER JOIN `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
        INNER JOIN `login_schemes` s ON s.id=ms.schemeID
        WHERE ms.all_status = '7' 
        AND (disbursement_date!='' AND disbursement_date IS NOT NULL)
        AND (disbursement!='' AND disbursement IS NOT NULL AND disbursement !='0')
        AND (FamilyID !='' AND FamilyID IS NOT NULL)
        AND (Memberid!='' AND Memberid IS NOT NULL)
        AND (District!='' AND District IS NOT NULL) 
        -- AND (pppdw_api_response IS NULL OR pppdw_api_response LIKE '%Failed%')
        AND (pppdw_api_response IS NULL OR pppdw_api_response NOT LIKE '%Succesfull%')
        LIMIT 2";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponsePPPDW_Medhavi($ApplicationID,$encodedPushedData,$response)
    {
        // $qry = "update member_schemes_medhavi_chhatra set pppdw_api_response='$response', 
        // pppdw_pushed_data='$encodedArray', pppdw_pushed_date= NOW()
        // where cand_id='$cand_id'";    

        $qry = "update `medhavi_chhatra` mc
        INNER JOIN `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id 
        set pppdw_api_response='$response', pppdw_pushed_data='$encodedPushedData', pppdw_pushed_date= NOW()
        where mc.application_ref_no = '$ApplicationID'";

       $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        } 
    }


    function navinikaran_overall_report($schmId,$phase){

        $qry="SELECT t.name AS nicDName,(SUM(pendingapp) + SUM(recom_to_Approve) + SUM(recom_to_reject) + SUM(sent_back) + SUM(adc_approved) + SUM(adc_rejected) + SUM(adc_sentback)) AS 'total_application', 
        SUM(pendingapp) AS 'total_pending',SUM(recom_to_Approve) AS 'total_recom_to_Approve',SUM(recom_to_reject) AS 'recom_to_reject',
        SUM(sent_back) AS 'sent_back', SUM(adc_approved) AS 'adc_approved', SUM(adc_rejected) AS 'adc_rejected', SUM(adc_sentback) AS 'adc_sentback'
        FROM
        
        (SELECT dm.name,COUNT(DISTINCT Application_Ref_No) AS 'pendingapp',0 AS 'recom_to_Approve',0 AS 'recom_to_reject',
        0 AS 'sent_back', 0 AS 'adc_approved', 0 AS 'adc_rejected',0 AS 'adc_sentback'  
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id 
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase') AND ms.all_status='0'  
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',COUNT(DISTINCT Application_Ref_No) AS 'recom_to_Approve',0 AS 'recom_to_reject',
        0 AS 'sent_back', 0 AS 'adc_approved', 0 AS 'adc_rejected',0 AS 'adc_sentback' 
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase')  AND ms.all_status='1' 
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',0 AS 'recom_to_Approve',COUNT(DISTINCT Application_Ref_No) AS 'recom_to_reject',
        0 AS 'sent_back', 0 AS 'adc_approved', 0 AS 'adc_rejected',0 AS 'adc_sentback'
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id 
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase')  AND ms.all_status='5' 
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',0 AS 'recom_to_Approve',0 AS 'recom_to_reject',
        COUNT(DISTINCT Application_Ref_No) AS 'sent_back',0 AS 'adc_approved', 0 AS 'adc_rejected',0 AS 'adc_sentback' 
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase') AND ms.all_status='8'  
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',0 AS 'recom_to_Approve',0 AS 'recom_to_reject',
        0 AS 'sent_back',COUNT(DISTINCT Application_Ref_No) AS 'adc_approved', 0 AS 'adc_rejected',0 AS 'adc_sentback'
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase') AND ms.all_status='2'  
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',0 AS 'recom_to_Approve',0 AS 'recom_to_reject',
        0 AS 'sent_back',0 AS 'adc_approved', COUNT(DISTINCT Application_Ref_No) AS 'adc_rejected',0 AS 'adc_sentback'
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase') AND ms.all_status='6'  
        GROUP BY dm.name
        
        UNION ALL
        
        SELECT dm.name,0 AS 'pendingapp',0 AS 'recom_to_Approve',0 AS 'recom_to_reject',
        0 AS 'sent_back',0 AS 'adc_approved', 0 AS 'adc_rejected',COUNT(DISTINCT Application_Ref_No) AS 'adc_sentback'
        FROM tbl_navinikaran_yojana t
        INNER JOIN member_schemes ms ON t.id=ms.cand_id
        INNER JOIN  district_master dm ON t.n_dcode=dm.ppp_dcode
        WHERE n_phase IN ('$phase') AND ms.all_status='13'  
        GROUP BY dm.name) AS t
        
        GROUP BY t.name";

        $query1 =  $this->db->query($qry);  
        if($query1->num_rows() > 0){
            return $query1->result_array();
        }else{
            return false;
        }
    }

    public function testInput($remarks)
    {
        $qry = "INSERT INTO test_table (`remarks`) VALUES ('$remarks')";          
        $q =  $this->db->query($qry);         
        if($q)
        {
            return 'INSERTED';
        }else{
            return FALSE;
        }
    }

    function generateRandomString($length = 10) {
       // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function get_approvedcases_payment()
    {
        $qry = "
        SELECT * FROM (
            SELECT tny.application_ref_no,tny.`Nameofapplicant`,tny.memberID, tny.`Mobile`,tny.`crid_verifiedCaste` AS category,c.`Category` AS cat, tny.`SubCaste` ,
                    tny.`PermanentAddress`,d.name AS district, tny.`AccountNo` ,
                   tny.`IFSCCode` , tny.`BankName`, tny.`BankBranch`, tny.`AccountHolderName`,
                   CASE 
                   WHEN ms.house_estimation_eligibility='0-10000' THEN '10000'
                   WHEN ms.house_estimation_eligibility='10001-20000' THEN '20000'
                   WHEN ms.house_estimation_eligibility='20001-30000' THEN '30000'
                   WHEN ms.house_estimation_eligibility='30001-40000' THEN '40000'
                   WHEN ms.house_estimation_eligibility='40001-50000' THEN '50000'
                   WHEN ms.house_estimation_eligibility='50001-60000' THEN '60000'
                   WHEN ms.house_estimation_eligibility='60001-70000' THEN '70000'
                   WHEN ms.house_estimation_eligibility='70001-80000' THEN '80000'
                   WHEN ms.house_estimation_eligibility='> 80000' THEN '80000'
                   END AS amount 
                   FROM tbl_navinikaran_yojana tny
                   INNER JOIN member_schemes ms ON (ms.cand_id = tny.id)  
                   INNER JOIN district_master d ON (d.id = tny.District ) 
                   INNER JOIN `tbl_category` c ON ( c.id = tny.Category )
                   WHERE ms.all_status = '2' AND tny.n_phase IN ('1','1a', '2a', '3') 
                    and tny.mobile is not NULL and tny.mobile !=''
                   -- and ms.payment_api_response is  null
                   and ms.payment_api_response LIKE '%400%' 
                   and tny.application_ref_no NOT in ('DENOTIFIED/2023/41244','DENOTIFIED/2023/48215','DENOTIFIED/2023/36273','DENOTIFIED/2023/43733')
                   ) p
                   
                   WHERE p.amount >= 40000
                   limit 3";          
        $query =  $this->db->query($qry);      

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }   
       
    }

    public function get_nav_paymentCounterID(){

            $select_query = "SELECT counter_id           
            FROM tbl_navinikaran_cridpaymentapi tny order by id desc limit 1";
            $rec = $this->db->query($select_query);

            $resp = $rec->result_array()[0];
            $counter_id =  $resp['counter_id'];
            //print_r($counter_id);die;
            if(empty($counter_id)){
                $counter_id = 1;
            }
            $counter_id++;
           // echo $counter_id;die;
            return $counter_id;   
    }

    public function navi_approvedcases_saveAPIResponse($inputsaveData){
        extract($inputsaveData);
        if(!empty($saralArray)){
            foreach($saralArray as $saral_id){               
                $qry = "update member_schemes ms
                inner join tbl_navinikaran_yojana tny on (tny.id =ms.cand_id)
                set payment_api_response='$apiResponse', push_for_paymentdate='$request_date' , payment_request_no = '$requestNumber'               
                where application_ref_no='".$saral_id['application_ref_no']."' and all_status='2'";  
                $q =  $this->db->query($qry);     
            }             

            $insert_qry = "INSERT INTO `db_groom`.`tbl_navinikaran_cridpaymentapi` ( `counter_id`,  `request_no`,  `request_date`,  `api_response`) VALUES  ($counter_id,  '".$requestNumber."', '".$request_date."', '".$apiResponse."' ) " ;
            $qry =  $this->db->query($insert_qry);      
        }
       
        if($qry){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function getStatusOnSaralNavinikaran_NewPhase()
    {
        $qry = "SELECT * FROM(

            SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
                    tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  adc_name,
                    dm.`name` AS dname,sd.`distcode` AS saraldistcode, ms.all_status,ms.cand_id,
                    sd.dist_location_code AS dist_location_code,sd.distname AS distname,ms.disbursement,ms.role,
                    CASE
                    WHEN ms.`role`='6'
                    THEN 'Tehsildar'
                    WHEN ms.`role`='7'
                    THEN 'SDM'
                    WHEN ms.`role`='8'
                    THEN 'BDPO'
                    WHEN ms.`role`='9'
                    THEN 'ADC'
                    ELSE ''
                    END AS Last_Action_By,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, tny.date_of_application, ms.`user_resp_date`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_date`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_date`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_date`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_date`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_date`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_date`
                    -- WHEN ms.`all_status`='9'
                    -- THEN ms.`on_hold_date_after_sanction`
                    -- WHEN ms.`all_status`='10'
                    -- THEN ms.`on_hold_date_after_approval`
                    -- WHEN ms.`all_status`='11'
                    -- THEN ms.`on_hold_date_after_rta`
                    -- WHEN ms.`all_status`='12'
                    -- THEN ms.`on_hold_date_after_rtr`
                    ELSE ''
                    END AS Last_Action_Date, 
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submitted'
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_remarks`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_remarks`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_remarks`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_remarks`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_remarks`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_remarks`
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'Hold after Sanction by DWO'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'Hold after Approval by DWO'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'Hold for DWO Pending by DWO'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'Hold for DWO Pending by DWO'
                    ELSE ''
                    END AS Last_Action_Remarks,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_api_response`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_api_response`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_api_response`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_api_response`
                    WHEN ms.`all_status`='7'
                    THEN ms.`disbursement_api_response`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_api_response`
                    -- WHEN ms.`all_status`='9'
                    -- THEN ms.`on_hold_api_response_after_sanction`
                    -- WHEN ms.`all_status`='10'
                    -- THEN ms.`on_hold_api_response_after_approval`
                    -- WHEN ms.`all_status`='11'
                    -- THEN ms.`on_hold_api_response_after_rta`
                    -- WHEN ms.`all_status`='12'
                    -- THEN ms.`on_hold_api_response_after_rtr`
                    ELSE ''
                    END AS Last_Action_Api_Response,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN '1'
                    WHEN ms.`all_status`='2'
                    THEN '6'
                    -- WHEN ms.`all_status`='3'
                    -- THEN '8'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
                    WHEN ms.`all_status`='6'
                    THEN '10'
                    WHEN ms.`all_status`='7'
                    THEN '10'
                    WHEN ms.`all_status`='8'
                    THEN '1'
                    -- WHEN ms.`all_status`='9'
                    -- THEN '8'
                    -- WHEN ms.`all_status`='10'
                    -- THEN '6'
                    -- WHEN ms.`all_status`='11'
                    -- THEN '3'
                    -- WHEN ms.`all_status`='12'
                    -- THEN '3'
                    ELSE ''
                    END AS Saral_Level,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'E'
                    WHEN ms.`all_status`='2'
                    THEN 'A'
                    -- WHEN ms.`all_status`='3'
                    -- THEN 'A'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
                    WHEN ms.`all_status`='6'
                    THEN 'R'
                    WHEN ms.`all_status`='7'
                    THEN 'A'
                    WHEN ms.`all_status`='8'
                    THEN 'H'
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'H'
                    ELSE ''
                    END AS Saral_Last_Action,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submission'
                    WHEN ms.`all_status`='2'
                    THEN 'Case Approval'
                    -- WHEN ms.`all_status`='3'
                    -- THEN 'Raise EPS'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
                    WHEN ms.`all_status`='6'
                    THEN 'Delivery'
                    WHEN ms.`all_status`='7'
                    THEN 'Delivery'
                    WHEN ms.`all_status`='8'
                    THEN 'Application Submission'
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'Raise EPS'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'Case Approval'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'Document Verification'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'Document Verification'
                    ELSE ''
                    END AS Saral_Last_Action_Desc,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
                    ELSE ''
                    END AS Last_Action_type,
                    ms.cron_push_date
            FROM `tbl_navinikaran_yojana` tny 
            INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
            INNER JOIN `district_master` dm ON tny.`n_dcode` = dm.ppp_dcode
            INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`ppp_dcode`=dm.`ppp_dcode`
            LEFT JOIN tbl_navinikaran_users l ON l.id = ms.`adc_id`
            WHERE n_phase IN ('1','1a', '2a', '3')

            ) p
            WHERE 
            -- DATE(Last_Action_Date) >= '2023-11-03' AND DATE(Last_Action_Date) != DATE(NOW())
            -- DATE(Last_Action_Date) = CURRENT_DATE()
            -- DATE(Last_Action_Date) = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY
            -- ) AND
             (Last_Action_Api_Response IS NULL 
            OR Last_Action_Api_Response NOT LIKE '%Success%') 
            AND p.all_status = '7'
            LIMIT 2000
            ";

        $query1 =  $this->db->query($qry);

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }


    public function getStatusMedhaviAllStatus(){

        $qry = "
            SELECT   * FROM(

            SELECT application_ref_no, currentDate, ApplicantName, Father_HusbandName, Gender,
            Permanentaddressofapplicant, MobileNumber, E_mail, District, md.distcode, mc.FamilyID, mc.Memberid,
            lg.name AS dwo_name,application_date,disbursement,ms.cand_id,
            md.dist_location_code AS dist_location_code,md.distname AS distname,ms.all_status, 
            CASE
            WHEN ms.`all_status`='1'
            THEN IF (ms.`user_resp_date` IS NULL, mc.`application_date`, ms.`user_resp_date`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            ELSE ''
            END AS Last_Action_Date, 
            CASE
            WHEN ms.`all_status`='1'
            THEN 'Application Submitted'
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_remarks`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_remarks`
            ELSE ''
            END AS Last_Action_Remarks,
            CASE
            WHEN ms.`all_status`='1'
            THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_api_response`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_api_response`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_api_response`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_api_response`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_api_response`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_api_response`
            ELSE ''
            END AS Last_Action_Api_Response,
            CASE
            WHEN ms.`all_status`='1'
            THEN '1'
            WHEN ms.`all_status`='2'
            THEN '4'
            WHEN ms.`all_status`='3'
            THEN '8'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
            WHEN ms.`all_status`='6'
            THEN '10'
            WHEN ms.`all_status`='7'
            THEN '10'
            WHEN ms.`all_status`='8'
            THEN '1'
            ELSE ''
            END AS Saral_Level,
            CASE
            WHEN ms.`all_status`='1'
            THEN 'E'
            WHEN ms.`all_status`='2'
            THEN 'A'
            WHEN ms.`all_status`='3'
            THEN 'A'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
            WHEN ms.`all_status`='6'
            THEN 'R'
            WHEN ms.`all_status`='7'
            THEN 'A'
            WHEN ms.`all_status`='8'
            THEN 'H'
            ELSE ''
            END AS Saral_Last_Action,
            CASE
            WHEN ms.`all_status`='1'
            THEN 'Application Submission'
            WHEN ms.`all_status`='2'
            THEN 'Document Verification and Case Approval'
            WHEN ms.`all_status`='3'
            THEN 'Raise EPS'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
            WHEN ms.`all_status`='6'
            THEN 'Delivery'
            WHEN ms.`all_status`='7'
            THEN 'Delivery'
            WHEN ms.`all_status`='8'
            THEN 'Application Submission'
            ELSE ''
            END AS Saral_Last_Action_Desc,
            CASE
            WHEN ms.`all_status`='1'
            THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
            ELSE ''
            END AS Last_Action_type
            FROM `medhavi_chhatra` mc 
            INNER JOIN `member_schemes_medhavi_chhatra` ms ON mc.id=ms.cand_id
            INNER JOIN tbl_saral_medhavi_district md ON mc.District=md.distname 
            LEFT JOIN login lg ON ms.user_id=lg.id
            ) p
        WHERE 
            -- p.application_ref_no IN ('DAMCSY/2024/88715','DAMCSY/2024/10840', 'DAMCSY/2024/90734' )

             DATE(Last_Action_Date) >= '2024-08-01' AND DATE(Last_Action_Date)!= DATE(NOW())
            -- DATE(Last_Action_Date) = '2023-11-15'
            -- DATE(Last_Action_Date) = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)
              AND (Last_Action_Api_Response IS NULL 
              OR Last_Action_Api_Response NOT LIKE '%Success%') 
              AND Saral_Last_Action NOT IN ( 'E' )
            -- AND   all_status='1' AND Saral_Last_Action = 'E' AND Saral_Level = '1' 
            ORDER BY Saral_Last_Action, Saral_Level
            LIMIT 1000
        ";

        $query1 =  $this->db->query($qry);   
        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }
  
    public function getStatusOnSaralAntarjatiyaAllStatus()
    {
        $qry = "SELECT * FROM(
            SELECT `Saral_ID`,`application_Date`,`ApplicantName`,`ApplicantFatherName`,`Gender`,
            `Address`,`MobileNumber`,`EMail`,`District`,md.distcode,tay.`familyID`,tay.`memberID`,
            lg.name AS dwo_name,disbursement,ms.cand_id,
            md.dist_location_code AS dist_location_code,md.distname AS distname, ms.all_status,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, tay.`application_Date`, ms.`user_resp_date`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_date`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_date`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_date`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_date`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_date`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_date`
            ELSE ''
            END AS Last_Action_Date, 
            CASE
            WHEN ms.`all_status`='0'
            THEN 'Application Submitted'
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_remarks`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_remarks`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_remarks`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_reject_remarks`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_remarks`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_remarks`
            ELSE ''
            END AS Last_Action_Remarks,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
            WHEN ms.`all_status`='2'
            THEN ms.`dwo_approve_api_response`
            WHEN ms.`all_status`='3'
            THEN ms.`app_sanction_api_response`
            WHEN ms.`all_status`='4'
            THEN ms.`on_hold_api_response`
            WHEN ms.`all_status`='6'
            THEN ms.`dwo_rejected_api_response`
            WHEN ms.`all_status`='7'
            THEN ms.`disbursement_api_response`
            WHEN ms.`all_status`='8'
            THEN ms.`send_back_api_response`
            ELSE ''
            END AS Last_Action_Api_Response,
            CASE
            WHEN ms.`all_status`='0'
            THEN '1'
            WHEN ms.`all_status`='2'
            THEN '6'
            WHEN ms.`all_status`='3'
            THEN '8'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
            WHEN ms.`all_status`='6'
            THEN '10'
            WHEN ms.`all_status`='7'
            THEN '10'
            WHEN ms.`all_status`='8'
            THEN '1'
            ELSE ''
            END AS Saral_Level,
            CASE
            WHEN ms.`all_status`='0'
            THEN 'E'
            WHEN ms.`all_status`='2'
            THEN 'A'
            WHEN ms.`all_status`='3'
            THEN 'A'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
            WHEN ms.`all_status`='6'
            THEN 'R'
            WHEN ms.`all_status`='7'
            THEN 'A'
            WHEN ms.`all_status`='8'
            THEN 'H'
            ELSE ''
            END AS Saral_Last_Action,
            CASE
            WHEN ms.`all_status`='0'
            THEN 'Application Submission'
            WHEN ms.`all_status`='2'
            THEN 'Case Approval'
            WHEN ms.`all_status`='3'
            THEN 'Raise EPS'
            WHEN ms.`all_status`='4'
            THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
            WHEN ms.`all_status`='6'
            THEN 'Delivery'
            WHEN ms.`all_status`='7'
            THEN 'Delivery'
            WHEN ms.`all_status`='8'
            THEN 'Application Submission'
            ELSE ''
            END AS Saral_Last_Action_Desc,
            CASE
            WHEN ms.`all_status`='0'
            THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
            ELSE ''
            END AS Last_Action_type
            FROM `tbl_antarjayatia_yojna` tay 
            INNER JOIN `member_schemes_antarjayatia_yojana` ms ON tay.id=ms.cand_id
            INNER JOIN tbl_saral_medhavi_district md ON tay.District=md.distname 
            LEFT JOIN login lg ON ms.user_id=lg.id
            ) p
            WHERE 
            Saral_ID IN ( 'MMSASY/2024/00897', 'MMSASY/2024/01538', 'MMSASY/2024/01549', 'MMSASY/2024/01495')
            -- all_status='8'  AND Saral_Last_Action = 'H' AND Saral_Level = '1' AND
            -- DATE(Last_Action_Date) >= '2024-05-03' and DATE(Last_Action_Date)!= DATE(NOW())
            -- DATE(Last_Action_Date) = '2023-11-14'
            -- DATE(Last_Action_Date)= DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)
            -- AND (Last_Action_Api_Response IS NULL 
            -- OR  Last_Action_Api_Response NOT LIKE '%Success%')   
            LIMIT 2000
            ";
        
            $query1 =  $this->db->query($qry);  

            if($query1) {
                return $query1->result_array();
            } else {
                return FALSE;
            } 
    }

    function updateApiResponseonAntarjatiyaAllStatus($id,$status,$schemeID,$response,$encodedArray,$Last_Action_type) {
        if($status=='0' && $Last_Action_type == 'freshApplied'){

            $qry = "update member_schemes_antarjayatia_yojana set applied_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='0' && $Last_Action_type == 'userApplied'){

            $qry = "update member_schemes_antarjayatia_yojana set user_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='2'){

            $qry = "update member_schemes_antarjayatia_yojana set dwo_approve_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='3'){

            $qry = "update member_schemes_antarjayatia_yojana set app_sanction_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='4'){

            $qry = "update member_schemes_antarjayatia_yojana set on_hold_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='6'){

            $qry = "update member_schemes_antarjayatia_yojana set dwo_rejected_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='7'){

            $qry = "update member_schemes_antarjayatia_yojana set disbursement_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='8'){

            $qry = "update member_schemes_antarjayatia_yojana set send_back_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
               
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    
    public function getStatusOnSaralNavinikaranAllStatus()
    {
        $qry = "SELECT * FROM(

            SELECT tny.`Application_Ref_No`,tny.`FatherHusbandname`,tny.`PermanentAddress`,tny.`Gender`,tny.`date_of_application`,
                    tny.`Mobile`,tny.`Nameofapplicant`,tny.`familyID`,tny.`memberID`,tny.`District`,l.`name` AS  adc_name,
                    dm.`name` AS dname,sd.`distcode` AS saraldistcode, ms.all_status,ms.cand_id,
                    sd.dist_location_code AS dist_location_code,sd.distname AS distname,ms.disbursement,ms.role,
                    CASE
                    WHEN ms.`role`='6'
                    THEN 'Tehsildar'
                    WHEN ms.`role`='7'
                    THEN 'SDM'
                    WHEN ms.`role`='8'
                    THEN 'BDPO'
                    WHEN ms.`role`='13'
                    THEN 'DDPO'
                    WHEN ms.`role`='14'
                    THEN 'CEOZP'
                    WHEN ms.`role`='15'
                    THEN 'DMC'
                    WHEN ms.`role`='9'
                    THEN 'ADC'
                    ELSE ''
                    END AS Last_Action_By,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, tny.date_of_application, ms.`user_resp_date`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_date`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_date`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_date`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_date`
                    -- WHEN ms.`all_status`='7'
                    -- THEN ms.`disbursement_date`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_date`
                    -- WHEN ms.`all_status`='9'
                    -- THEN ms.`on_hold_date_after_sanction`
                    -- WHEN ms.`all_status`='10'
                    -- THEN ms.`on_hold_date_after_approval`
                    -- WHEN ms.`all_status`='11'
                    -- THEN ms.`on_hold_date_after_rta`
                    -- WHEN ms.`all_status`='12'
                    -- THEN ms.`on_hold_date_after_rtr`
                    ELSE ''
                    END AS Last_Action_Date, 
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submitted'
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_remarks`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_remarks`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_remarks`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_remarks`
                    -- WHEN ms.`all_status`='7'
                    -- THEN ms.`disbursement_remarks`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_remarks`
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'Hold after Sanction by DWO'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'Hold after Approval by DWO'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'Hold for DWO Pending by DWO'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'Hold for DWO Pending by DWO'
                    ELSE ''
                    END AS Last_Action_Remarks,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, ms.`applied_api_response`, ms.`user_api_response`)
                    WHEN ms.`all_status`='2'
                    THEN ms.`adc_approved_api_response`
                    -- WHEN ms.`all_status`='3'
                    -- THEN ms.`app_sanction_api_response`
                    -- WHEN ms.`all_status`='4'
                    -- THEN ms.`on_hold_api_response`
                    WHEN ms.`all_status`='6'
                    THEN ms.`adc_rejected_api_response`
                    -- WHEN ms.`all_status`='7'
                    -- THEN ms.`disbursement_api_response`
                    WHEN ms.`all_status`='8'
                    THEN ms.`send_back_api_response`
                    -- WHEN ms.`all_status`='9'
                    -- THEN ms.`on_hold_api_response_after_sanction`
                    -- WHEN ms.`all_status`='10'
                    -- THEN ms.`on_hold_api_response_after_approval`
                    -- WHEN ms.`all_status`='11'
                    -- THEN ms.`on_hold_api_response_after_rta`
                    -- WHEN ms.`all_status`='12'
                    -- THEN ms.`on_hold_api_response_after_rtr`
                    ELSE ''
                    END AS Last_Action_Api_Response,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN '1'
                    WHEN ms.`all_status`='2'
                    THEN '6'
                    -- WHEN ms.`all_status`='3'
                    -- THEN '8'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', '1', '10')
                    WHEN ms.`all_status`='6'
                    THEN '10'
                    -- WHEN ms.`all_status`='7'
                    -- THEN '10'
                    WHEN ms.`all_status`='8'
                    THEN '1'
                    -- WHEN ms.`all_status`='9'
                    -- THEN '8'
                    -- WHEN ms.`all_status`='10'
                    -- THEN '6'
                    -- WHEN ms.`all_status`='11'
                    -- THEN '3'
                    -- WHEN ms.`all_status`='12'
                    -- THEN '3'
                    ELSE ''
                    END AS Saral_Level,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'E'
                    WHEN ms.`all_status`='2'
                    THEN 'A'
                    -- WHEN ms.`all_status`='3'
                    -- THEN 'A'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', 'K', 'H')
                    WHEN ms.`all_status`='6'
                    THEN 'R'
                    -- WHEN ms.`all_status`='7'
                    -- THEN 'A'
                    WHEN ms.`all_status`='8'
                    THEN 'H'
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'H'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'H'
                    ELSE ''
                    END AS Saral_Last_Action,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN 'Application Submission'
                    WHEN ms.`all_status`='2'
                    THEN 'Case Approval'
                    -- WHEN ms.`all_status`='3'
                    -- THEN 'Raise EPS'
                    -- WHEN ms.`all_status`='4'
                    -- THEN IF (ms.`on_hold_remarks`='Code of conduct', 'Application Submission', 'Delivery')
                    WHEN ms.`all_status`='6'
                    THEN 'Delivery'
                    -- WHEN ms.`all_status`='7'
                    -- THEN 'Delivery'
                    WHEN ms.`all_status`='8'
                    THEN 'Application Submission'
                    -- WHEN ms.`all_status`='9'
                    -- THEN 'Raise EPS'
                    -- WHEN ms.`all_status`='10'
                    -- THEN 'Case Approval'
                    -- WHEN ms.`all_status`='11'
                    -- THEN 'Document Verification'
                    -- WHEN ms.`all_status`='12'
                    -- THEN 'Document Verification'
                    ELSE ''
                    END AS Saral_Last_Action_Desc,
                    CASE
                    WHEN ms.`all_status`='0'
                    THEN IF (ms.`user_resp_date` IS NULL, 'freshApplied', 'userApplied')
                    ELSE ''
                    END AS Last_Action_type,
                    ms.cron_push_date
            FROM `tbl_navinikaran_yojana` tny 
            INNER JOIN `member_schemes` ms ON tny.id=ms.cand_id
            INNER JOIN `district_master` dm ON tny.`n_dcode` = dm.ppp_dcode
            INNER JOIN `tbl_saral_medhavi_district` sd ON sd.`ppp_dcode`=dm.`ppp_dcode`
            LEFT JOIN tbl_navinikaran_users l ON l.id = ms.`adc_id`
            WHERE n_phase IN ('1','1a', '2a', '3') 
            ) p
            WHERE  
            application_ref_no IN ( 'DENOTIFIED/2023/93917',
                                    'DENOTIFIED/2023/393271',
                                    'DENOTIFIED/2023/389884',
                                    'DENOTIFIED/2023/386954',
                                    'DENOTIFIED/2023/385728',
                                    'DENOTIFIED/2023/385047',
                                    'DENOTIFIED/2023/366748',
                                    'DENOTIFIED/2023/365333',
                                    'DENOTIFIED/2023/335721',
                                    'DENOTIFIED/2023/327007',
                                    'DENOTIFIED/2023/318427',
                                    'DENOTIFIED/2023/317616',
                                    'DENOTIFIED/2023/299461',
                                    'DENOTIFIED/2023/281925',
                                    'DENOTIFIED/2023/256854',
                                    'DENOTIFIED/2023/252440',
                                    'DENOTIFIED/2023/187718',
                                    'DENOTIFIED/2023/143783',
                                    'DENOTIFIED/2023/141440',
                                    'DENOTIFIED/2023/119656',
                                    'DENOTIFIED/2023/112155',
                                    'DENOTIFIED/2023/106290' )
                -- DATE(Last_Action_Date) >= '2024-06-03' AND DATE(Last_Action_Date) != DATE(NOW())              
                -- DATE(Last_Action_Date) = CURRENT_DATE()
                -- DATE(Last_Action_Date) = DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)
                -- AND (Last_Action_Api_Response IS NULL 
                -- OR Last_Action_Api_Response NOT LIKE '%Success%')  
                -- AND all_status='2'  AND Saral_Last_Action = 'A' AND Saral_Level = '6' 
                -- AND application_ref_no IN ( 'DENOTIFIED/2023/394709','DENOTIFIED/2023/241227','DENOTIFIED/2023/25955','DENOTIFIED/2023/141446','DENOTIFIED/2023/04482','DENOTIFIED/2023/150632' )
                LIMIT 2000";

        $query1 =  $this->db->query($qry);

        if($query1) {
            return $query1->result_array();
        } else {
            return FALSE;
        } 
    }

    public function updateApiResponseNavinikaranAllStatus($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type)
    {
        if($status=='0' && $Last_Action_type == 'freshApplied'){

            $qry = "update member_schemes set applied_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='0' && $Last_Action_type == 'userApplied'){

            $qry = "update member_schemes set user_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }elseif($status=='2'){

            $qry = "update member_schemes set adc_approved_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
        // elseif($status=='3'){

        //     $qry = "update member_schemes set app_sanction_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }elseif($status=='4'){

        //     $qry = "update member_schemes set on_hold_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }
        elseif($status=='6'){

            $qry = "update member_schemes set adc_rejected_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
        // elseif($status=='7'){

        //     $qry = "update member_schemes set disbursement_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }
        elseif($status=='8'){

            $qry = "update member_schemes set send_back_api_response='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
            where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        }
        // elseif($status=='9'){

        //     $qry = "update member_schemes set on_hold_api_response_after_sanction='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }elseif($status=='10'){

        //     $qry = "update member_schemes set on_hold_api_response_after_approval='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }elseif($status=='11'){

        //     $qry = "update member_schemes set on_hold_api_response_after_rta='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }elseif($status=='12'){

        //     $qry = "update member_schemes set on_hold_api_response_after_rtr='$response',cron_push_date= NOW(), pending_pushed_data='$encodedArray' 
        //     where schemeID='$schemeID' and cand_id='$id' and all_status='$status'"; 
        // }
                 
        $q =  $this->db->query($qry);         
        if($q)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
 

    public function updateDocsMedhavi($Application_ID,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIdCard,$path_CopyofIncomeCertificate,$path_Haryana_residence_certificate)
    {
        $qry = "UPDATE medhavi_chhatra SET
        Applicantphoto='$path_Applicantphoto',
        CasteCertificate='$path_CasteCertificate',
        Marksheetscholarshipclaimed='$path_Marksheetscholarshipclaimed',
        CopyofBankAccountNo='$path_CopyofBankAccountNo',
        CopyofIdCard='$path_CopyofIdCard',
        CopyofIncomeCertificate='$path_CopyofIncomeCertificate',
        Haryana_residence_certificate='$path_Haryana_residence_certificate'
        WHERE Application_Ref_No='$Application_ID'
        ";

        $qq =  $this->db->query($qry); 
        if($qq)
        {
            return TRUE;
        }else{

            return FALSE;
        }

    }


    public function check_saralID_exists_Medhavi($application_ref_no){
        //check if applicationrefno allready present
        $qryChk = "SELECT * FROM  medhavi_chhatra m WHERE application_ref_no = '$application_ref_no'";
        $qryChkResp =  $this->db->query($qryChk);
        if ($qryChkResp->result_id->num_rows > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function check_duplicate_saralID_exists_Medhavi($application_ref_no){
        //check if applicationrefno allready present
        $qryChk = "SELECT * FROM  medhavi_chhatra_deactivated_applications m WHERE application_ref_no = '$application_ref_no'";
        $qryChkResp =  $this->db->query($qryChk);
        if ($qryChkResp->result_id->num_rows > 0) {
           return TRUE;
        }else{
           return FALSE;
        }
    }

   
    public function addInstituteSociety($data1){
        extract($data1);
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date('Y-m-d H:i:s');  
        $scheme_id = '5';
        $FAIS_data = array(
            'scheme_id' => $scheme_id,
            'district_id' => $District,
            'subdivision_id' => $Subdivision,
            'tehsil_id' => $Tehsil,
            'districtName' => $DistrictName,
            'tehsilName' => $TehsilName,
            'application_ref_no' => $ApplicationRefNo,
            'application_date' => $ApplicationDateTime,
            'FAIS_name' => $InstitutionSocietyName, 
            'RegistrationNo' => $RegistrationNo,
            'applied_amount' => $AmountAppliedFor,
            'date_created' => $currentDate
        );

        $this->db->insert('tbl_FAIS_scheme', $FAIS_data);
        $FAIS_id = $this->db->insert_id();
        if( $FAIS_id ){

            $FAIS_detail_data = array(
                'FAIS_id' => $FAIS_id,
                'FAIS_address' => $Address,
                'FAIS_pincode' => $Pincode,
                'PurposeOfGrantAmount' => $PurposeOfGrantAmount,
                'AnyPreviousGrantFunding' => $AnyPreviousGrantFunding,
                'SourceOfPreviousFunding' => $SourceOfPreviousFunding,
                'YearOfAvailingPreviousFunding' => $YearOfAvailingPreviousFunding,
                'AmountReceivedPreviousFunding' => $AmountReceivedPreviousFunding,
                'HasOwnPlot' => $HasOwnPlot,
                'LandDonatedBy' => $LandDonatedBy,
                'NameOfInstituteHead' => $NameOfInstituteHead,
                'CasteOfInstituteHead' => $CasteOfInstituteHead,
                'BankName' => $BankName,
                'BankBranch' => $BankBranch,
                'AccountNumber' => $AccountNumber,
                'IFSCCode' => $IFSCCode,
                'AccountHolderName' => $AccountHolderName,
                'PANNumber' => $PANNumber,
                'SaralApplicationDate' => $SaralApplicationDate,
                'SchemeApplicationDate' => $SchemeApplicationDate,
                'ApplicationID' => $ApplicationID,
                'KioskDetails' => $KioskDetails,
                'PaymentDetails' => $PaymentDetails,
                'ServiceVersion' => $ServiceVersion,
                'RegistrationDate' => $RegistrationDate,
                'MobileNo' => $MobileNo,
                'LandlineNo' => $LandlineNo,
                'OtherPurposeOfGrantAmount' => $OtherPurposeOfGrantAmount,
                'path_ApplicationFormForSchemeDoc' => $path_ApplicationFormForSchemeDoc,
                'path_AgreementForSchemeDoc' => $path_AgreementForSchemeDoc,
                'path_AllotmentOfUCPDoc' => $path_AllotmentOfUCPDoc,
                'path_NameRegistrationConstitutionDoc' => $path_NameRegistrationConstitutionDoc,
                'path_LandOwnershipSizeDoc' => $path_LandOwnershipSizeDoc,
                'path_PANDetailDoc' => $path_PANDetailDoc,
                'path_BankAccountDetailDoc' => $path_BankAccountDetailDoc,
                'path_AccountStmtBalanceSheetDoc' => $path_AccountStmtBalanceSheetDoc,
                'path_WorkDetailEstimatedCostDoc' => $path_WorkDetailEstimatedCostDoc,
                'path_UtilizationCertificateDoc' => $path_UtilizationCertificateDoc 
            );
            
            $this->db->insert('tbl_FAIS_scheme_detail', $FAIS_detail_data);
            $FAIS_detail_id = $this->db->insert_id();

           
            $FAIS_action_data = array(
                'FAIS_id' => $FAIS_id,
                'user_role' => '2',
                'Action_By' => 'TWO '.$TehsilName, 
                'Action_Date' => $currentDate ,
                'Action_Status' => '0', 
                'Action_Remarks' => 'Pending' 
            );
            $this->db->insert('tbl_FAIS_action', $FAIS_action_data);
           
            if( $FAIS_detail_id ){
                return 'Applied';
            }else{
                return FALSE;
            } 
        }
 
    }




}
