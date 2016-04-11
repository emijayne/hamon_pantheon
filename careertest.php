<?php
$xml=simplexml_load_file("http://hamonusa-hr.com/jobposting/requisition.xml") or die("Error: Cannot create object");

echo '<div id="jobxml" class="accordion" data-accordion>';

foreach($xml->children() as $job) { 
echo '  <div class="row accordian-item" data-accordion-item>';
echo '    <h4 class="column small-9 large 11">' . $job->Title . '&nbsp;<small>for ' . $job->Unit . '</small></h4>';
echo '    <a class="small button secondary column small-3 large-1" href="https://hamonusa-hr.com/onlineapp/default.aspx?position=' . $job->Code . '">Apply Now</a>';
echo '    <p class="column large-12">' . $job->Mission . '</p>';
echo '    <a href="#" class="column large-12 accordion-title" hreflang="en">View Job Details</a>';
echo '    <div class="column large-12 accordion-content" data-tab-content>';
echo '      <h5>Key Responsibilities</h5>' . $job->KeyResponsibilities;
echo '      <h5>Critical Skills</h5>' . $job->CriticalSkills;
echo '      <p>Posted: ' . $job->OpenDate . '<br />Code: ' . $job->Code . '</p>';
echo '    </div>';
echo '  </div>';
} 

echo '<div>';

?>
