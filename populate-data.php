<?php
session_start();

function createApplicantData()
{
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "job_portal";

  include "./backend/helpers.php";

  $conn = new mysqli($host, $user, $password, $db);
  $helpers = new Helpers($conn, $_SESSION);

  $db_classic = "classicmodels";

  $usersQ = $conn->query("SELECT 
                          TRIM(c.contactFirstName) as 'fname',
                          TRIM(c.contactLastName) as 'lname',
                          TRIM(c.phone) as 'contact',
                          LOWER(CONCAT(TRIM(c.contactFirstName), TRIM(c.contactLastName), '@gmail.com')) as 'email'
                         FROM $db_classic.customers c LIMIT 75");


  $users = $usersQ->fetch_all(MYSQLI_ASSOC);
  foreach ($users as $user) {
    $user = (object)$user;

    $applicantCData = $helpers->select_all_individual("users", "id IS NOT NULL AND role='applicant' ORDER BY RAND() LIMIT 1");

    $applicantInsertData = array(
      "fname" => $user->fname,
      "lname" => $user->lname,
      "address" => $applicantCData->address,
      "district" => $applicantCData->district,
      "contact" => $user->contact,
      "email" => $user->email,
      "password" => '$argon2i$v=19$m=65536,t=4,p=1$WDBKZGRQdDFOTnc2N2N3aQ$xeRcS4lx2aihxjb4JwtyRUCkx7Um1vurHMPMpRtptac',
      "role" => "applicant"
    );

    $applicantId = $helpers->insert("users", $applicantInsertData);

    if ($applicantId) {
      echo "Applicant $user->fname $user->lname INSERTED ID: $applicantId \n";

      $jobPreferenceData = $helpers->select_all_with_params("job_preference", "user_id='$applicantCData->id'");
      if (count($jobPreferenceData) > 0) {
        foreach ($jobPreferenceData as $jobPreference) {
          $jobPreferenceDataArr = array(
            "user_id" => $applicantId,
            "job_title" => empty($jobPreference->job_title) ? null : $jobPreference->job_title,
            "job_types" => empty($jobPreference->job_types) ? null : $jobPreference->job_types,
            "work_schedules" => empty($jobPreference->work_schedules) ? null : $jobPreference->work_schedules,
            "base_pay" => empty($jobPreference->base_pay) ? null : $jobPreference->base_pay,
            "location_type" => empty($jobPreference->location_type) ? null : $jobPreference->location_type,
          );

          $jp = $helpers->insert("job_preference", $jobPreferenceDataArr);
          echo "Applicant $user->fname $user->lname JOB PREFERENCE ID: $jp \n";
        }
      } else {
        echo "No Job Preference Data \n";
      }

      $educationData = $helpers->select_all_with_params("education", "user_id='$applicantCData->id'");
      if (count($educationData) > 0) {
        foreach ($educationData as $education) {
          $educationDataArr = array(
            "user_id" => $applicantId,
            "attainment_id" => empty($education->attainment_id) ? null : $education->attainment_id,
            "course" => empty($education->course) ? null : $education->course,
            "school_name" => empty($education->school_name) ? null : $education->school_name,
            "base_pay" => empty($education->base_pay) ? null : $education->base_pay,
            "sy" => empty($education->sy) ? null : $education->sy,
          );

          $edu = $helpers->insert("education", $educationDataArr);
          echo "Applicant $user->fname $user->lname EDUCATION ID: $edu \n";
        }
      } else {
        echo "No Education Data \n";
      }

      $expData = $helpers->select_all_with_params("work_experience", "user_id='$applicantCData->id'");
      if (count($expData) > 0) {
        foreach ($expData as $exp) {
          $expDataArr = array(
            "user_id" => $applicantId,
            "job_title" => empty($exp->job_title) ? null : $exp->job_title,
            "company_id" => empty($exp->company_id) ? null : $exp->company_id,
            "industry_id" => empty($exp->industry_id) ? null : $exp->industry_id,
            "work_from" => empty($exp->work_from) ? null : $exp->work_from,
            "work_to" => empty($exp->work_to) ? null : $exp->work_to,
          );

          $expIn = $helpers->insert("work_experience", $expDataArr);
          echo "Applicant $user->fname $user->lname WORK EXPERIENCE ID: $expIn \n";
        }
      } else {
        echo "No Experience Data \n";
      }

      $applicantSkills = $helpers->select_all_with_params("applicant_skills", "user_id='$applicantCData->id'");
      if (count($applicantSkills) > 0) {
        foreach ($applicantSkills as $applicantSkill) {
          $applicantSkillsDataArr = array(
            "user_id" => $applicantId,
            "skill_id" => empty($applicantSkill->skill_id) ? null : $applicantSkill->skill_id
          );

          $skills = $helpers->insert("applicant_skills", $applicantSkillsDataArr);
          echo "Applicant $user->fname $user->lname SKILLS ID: $skills \n";
        }
      } else {
        echo "No Skills Data \n";
      }
    } else {
      echo "Applicant Not Inserted \n";
    }

    // print_r($user);
  }
}

function createCompanyData()
{
  $companies = array(
    array(
      "name" => "SM City Iloilo",
      "jobs" => array("Mall Operations Manager", "Customer Service Assistant")
    ),
    array(
      "name" => "Robinson's Mall Iloilo",
      "jobs" => array("Leasing Manager", "Marketing Officer ")
    ),
    array(
      "name" => "Ayala Mall Iloilo",
      "jobs" => array("Events Coordinator", "Retail Leasing Assistant")
    ),
    array(
      "name" => "Megaworld Lifestyle Mall",
      "jobs" => array("Property Manager", "Sales and Marketing Associate")
    ),
    array(
      "name" => "Jollibee",
      "jobs" => array("Store Manager", "Crew Member")
    ),
    array(
      "name" => "McDonald's",
      "jobs" => array("Assistant Restaurant Manager", "Service Crew")
    ),
    array(
      "name" => "Chowking",
      "jobs" => array("Shift Supervisor", "Kitchen Staff")
    ),
    array(
      "name" => "Mang Inasal",
      "jobs" => array("Restaurant Supervisor", "Cashier")
    ),
    array(
      "name" => "KFC",
      "jobs" => array("Operations Supervisor", "Delivery Rider")
    ),
    array(
      "name" => "Starbucks",
      "jobs" => array("Barista", "Store Supervisor")
    ),
    array(
      "name" => "Coca-Cola Philippines",
      "jobs" => array("Sales Account Executive", "Quality Assurance Analyst")
    ),
    array(
      "name" => "San Miguel Brewery",
      "jobs" => array("Production Supervisor", "Marketing Specialist")
    ),
    array(
      "name" => "Philippine National Bank (PNB)",
      "jobs" => array("Branch Operations Officer", "Credit Analyst")
    ),
    array(
      "name" => "Bank of the Philippine Islands (BPI)",
      "jobs" => array("Relationship Manager", "Teller")
    ),
    array(
      "name" => "Metropolitan Bank and Trust Company (Metrobank)",
      "jobs" => array("Loan Officer", "Customer Service Representative")
    ),
    array(
      "name" => "Union Bank of the Philippines",
      "jobs" => array("IT Specialist", "Financial Analyst")
    ),
    array(
      "name" => "Philippine Long Distance Telephone Company (PLDT)",
      "jobs" => array("Network Engineer", "Customer Service Representative")
    ),
    array(
      "name" => "Globe Telecom",
      "jobs" => array("Business Analyst", "Field Technician")
    ),
    array(
      "name" => "Smart Communications",
      "jobs" => array("Sales Executive", "Technical Support Engineer")
    ),
    array(
      "name" => "Iloilo Doctors Hospital",
      "jobs" => array("Registered Nurse", "Laboratory Technician")
    ),
    array(
      "name" => "Western Visayas Medical Center",
      "jobs" => array("Radiologic Technologist", "Pharmacist")
    ),
    array(
      "name" => "St. Paul's Hospital Iloilo",
      "jobs" => array("Medical Technologist", "Administrative Officer")
    ),
    array(
      "name" => "University of the Philippines Visayas",
      "jobs" => array("Assistant Professor", "Research Associate")
    ),
    array(
      "name" => "Central Philippine University",
      "jobs" => array("Academic Coordinator", "IT Support Specialist")
    ),
    array(
      "name" => "Iloilo Science and Technology Park",
      "jobs" => array("Project Manager", "Research and Development Specialist")
    ),
    array(
      "name" => "Iloilo Economic Zone",
      "jobs" => array("Business Development Officer", "Economic Analyst")
    ),
    array(
      "name" => "Urban Planner",
      "jobs" => array("Public Information Officer", "Iloilo Provincial Government")
    ),
    array(
      "name" => "Health Program Coordinator",
      "jobs" => array("Administrative Assistant", "Philippine Ports Authority (PPA)")
    ),
    array(
      "name" => "Iloilo City Water Supply System (ICWSS)",
      "jobs" => array("Water Treatment Operator", "Environmental Engineer")
    ),
    array(
      "name" => "Metro Iloilo Hospital",
      "jobs" => array("Registered Nurse", "Laboratory Technician")
    ),
    array(
      "name" => "Telus",
      "jobs" => array("IT Specialist", "Financial Analyst")
    ),
    array(
      "name" => "Iloilo Supermart",
      "jobs" => array("Branch Manager", "Cashier")
    ),
  );
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "job_portal";

  include "./backend/helpers.php";

  $conn = new mysqli($host, $user, $password, $db);
  $helpers = new Helpers($conn, $_SESSION);

  /**
   * 
   * SQL QUERY : INSERT INTO job_portal.users(fname, lname, address, district, contact, email, `password`, `role`, date_created) 
   *  SELECT 
   *    cc.contactFirstName,
   *    cc.contactLastName,
   *    (SELECT ju.address FROM job_portal.users ju WHERE ju.address <> '' GROUP BY ju.district ORDER BY RAND() LIMIT 1),
   *    (SELECT ju.district FROM job_portal.users ju GROUP BY ju.district ORDER BY RAND() LIMIT 1),
   *    cc.phone,
   *    LOWER(CONCAT(cc.contactFirstName, cc.contactLastName, '@gmail.com')),
   *    '$argon2i$v=19$m=65536,t=4,p=1$blAudjU3emJGaHR4VE16dA$q4SYAg+hmpvJrSUF/OyjeFJc7zXXBI9UIXOxo23XfqM',
   *    'employer',
   *    (SELECT CURRENT_DATE())
   *  FROM classicmodels.customers cc
   *  LIMIT 30 OFFSET 75
   * 
   */

  $employers = $conn->query("SELECT * FROM job_portal.users WHERE role='employer' AND company_id IS NULL");
  $employerRes = $employers->fetch_all(MYSQLI_ASSOC);

  for ($i = 0; $i < count($employerRes); $i++) {
    $employer = (object)$employerRes[$i];
    $company = (object)$companies[$i];

    $verificationQ = $conn->query("SELECT * FROM job_portal.verification WHERE `status` = 'approved' AND id IN(3, 5) ORDER BY RAND() LIMIT 1");
    $verificationData = $verificationQ->fetch_object();

    $verificationArr = array(
      "business_permit" => $verificationData->business_permit,
      "status" => $verificationData->status,
      "message" => $verificationData->message
    );

    // $verificationID = 1;
    $verificationID = $helpers->insert("verification", $verificationArr);
    echo $company->name . " verification inserted ID: $verificationID\n";

    $randCompanyQ = $conn->query("SELECT * FROM job_portal.company WHERE industry_id IS NOT NULL ORDER BY RAND() LIMIT 1");
    $randCompanyData = $randCompanyQ->fetch_object();

    $companyArr = array(
      "verification_id" => $verificationID,
      "industry_id" => $randCompanyData->industry_id,
      "name" => $company->name,
      "district" => $employer->district
    );

    // $companyId = 1;
    $companyId = $helpers->insert("company", $companyArr);
    echo $company->name . " data inserted ID: $companyId\n";

    $updateEmployerQ = $conn->query("UPDATE users SET company_id='$companyId' WHERE id='$employer->id'");
    echo "Attached " . $company->name . " ID: $companyId To $employer->lname ID: $employer->id \n";

    $jobArr = array();
    $randJObQ = $conn->query("SELECT * FROM job_portal.job ORDER BY RAND() LIMIT 2");
    $jobData = $randJObQ->fetch_all(MYSQLI_ASSOC);

    for ($j = 0; $j < count($jobData); $j++) {
      $jobName = $company->jobs[$j];
      $objJobData = (object)$jobData[$j];

      array_push(
        $jobArr,
        array(
          "company_id" => $companyId,
          "title" => $jobName,
          "type" => $objJobData->type,
          "experience_level" => $objJobData->experience_level,
          "location_type" => $objJobData->location_type,
          "schedule" => $objJobData->schedule,
          "description" => $objJobData->description,
          "pay" => $objJobData->pay,
          "benefits" => $objJobData->benefits,
          "qualifications" => $objJobData->qualifications,
          "experience" => $objJobData->experience,
          "status" => "active"
        )
      );
    }

    foreach ($jobArr as $job) {
      $jobId = $helpers->insert("job", $job);
      echo $company->name . " Job " . $job["title"] . " inserted ID: $jobId\n";
    }
  }
}
