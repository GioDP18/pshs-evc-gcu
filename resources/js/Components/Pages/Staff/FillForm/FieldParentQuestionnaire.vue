<template>
    <div>
        <div class="container">
            <div class="text-header">PARENT QUESTIONNAIRE FORM</div>
            <div class="left-right">
                <div class="left">
                    <div class="top">
                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus:</label>
                            <input type="text" class="form-control" id="campus" required>
                        </div>

                        <div class="mb-3">
                            <label for="childName" class="form-label">Your Child’s Name:</label>
                            <input type="text" class="form-control" id="childName" required>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                            aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{ progress }}%</div>
                    </div>
                    <div class="page" v-show="currentPage === 1">
                        <div class="section-title mb-3">
                            <strong>I. INTEGRATION IN THE FAMILY</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">1.1 Did the child grow up with both parents?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bothParents" id="bothParentsYes"
                                    value="yes" required>
                                <label class="form-check-label notbold" for="bothParentsYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bothParents" id="bothParentsNo"
                                    value="no">
                                <label class="form-check-label notbold" for="bothParentsNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label notbold">If not, with:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="guardian" id="fatherOnly"
                                    value="father">
                                <label class="form-check-label notbold" for="fatherOnly">Father only</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="guardian" id="motherOnly"
                                    value="mother">
                                <label class="form-check-label notbold" for="motherOnly">Mother only</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="guardianName" class="form-label notbold">Name of the Guardian:</label>
                                <input type="text" class="form-control" id="guardianName">
                            </div>

                            <div class="col  mb-3">
                                <label for="relationship" class="form-label notbold">Relationship:</label>
                                <input type="text" class="form-control" id="relationship">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="yearsWithGuardian" class="form-label">Number of years the child stayed with the
                                guardian:</label>
                            <input type="number" class="form-control" id="yearsWithGuardian" required>
                        </div>
                        <div class="mb-3">
                            <label for="duties" class="form-label">1.2 Does the child have specific duties at
                                home?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="duties" id="dutiesYes" value="yes">
                                <label class="form-check-label notbold" for="dutiesYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="duties" id="dutiesNo" value="no">
                                <label class="form-check-label notbold" for="dutiesNo">No</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="dutiesDetails" class="form-label notbold">If yes, please enumerate
                                    below:</label>
                                <textarea class="form-control" id="dutiesDetails" rows="3"></textarea>
                            </div>
                            <div class="col mb-3">
                                <label for="dutiesFrequency" class="form-label notbold">How often?</label>
                                <textarea class="form-control" id="dutiesFrequency" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="behavior" class="form-label">1.3 How would you describe your child’s behavior at
                                home?</label>
                            <textarea class="form-control" id="behavior" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="personality" class="form-label">1.4 Personality wise, how would you describe
                                your
                                child?</label>
                            <textarea class="form-control" id="personality" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="goOut" class="form-label">1.5 Do you go out with your child during free
                                time?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="goOut" id="goOutYes" value="yes">
                                <label class="form-check-label notbold" for="goOutYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="goOut" id="goOutNo" value="no">
                                <label class="form-check-label notbold" for="goOutNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="goOutFrequency" class="form-label notbold">If yes, how often?</label>
                            <input type="text" class="form-control" id="goOutFrequency">
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 2">
                        <div class="section-title mb-3">
                            <strong>II. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">2.1 As parents, would you consider yourselves to be
                                healthy?</label>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Father:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="healthyFather"
                                            id="healthyFatherYes" value="yes">
                                        <label class="form-check-label notbold" for="healthyFatherYes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="healthyFather"
                                            id="healthyFatherNo" value="no">
                                        <label class="form-check-label notbold" for="healthyFatherNo">No</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label">Mother:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="healthyMother"
                                            id="healthyMotherYes" value="yes">
                                        <label class="form-check-label notbold" for="healthyMotherYes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="healthyMother"
                                            id="healthyMotherNo" value="no">
                                        <label class="form-check-label notbold" for="healthyMotherNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="disease" class="form-label">2.2 Has there been any serious disease(s) in the
                                family?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disease" id="diseaseYes" value="yes">
                                <label class="form-check-label notbold" for="diseaseYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disease" id="diseaseNo" value="no">
                                <label class="form-check-label notbold" for="diseaseNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="diseaseDescription" class="form-label notbold">If yes, please specify below the
                                disease(s) and the family member who has it:</label>
                            <textarea class="form-control" id="diseaseDescription" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">2.3 How would you describe your pregnancy with your child?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pregnancy" id="pregnancyNormal"
                                    value="normal">
                                <label class="form-check-label notbold" for="pregnancyNormal">Normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pregnancy" id="pregnancyDifficult"
                                    value="difficult">
                                <label class="form-check-label notbold" for="pregnancyDifficult">Difficult</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lostChild" class="form-label">2.5 Have you lost a child out of death?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lostChild" id="lostChildYes"
                                    value="yes">
                                <label class="form-check-label notbold" for="lostChildYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lostChild" id="lostChildNo"
                                    value="no">
                                <label class="form-check-label notbold" for="lostChildNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="seriousAccident" class="form-label">2.6 Did your child experience a serious
                                accident?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="seriousAccident"
                                    id="seriousAccidentYes" value="yes">
                                <label class="form-check-label notbold" for="seriousAccidentYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="seriousAccident"
                                    id="seriousAccidentNo" value="no">
                                <label class="form-check-label notbold" for="seriousAccidentNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="sleepWell" class="form-label">2.7 Does your child sleep well at night?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sleepWell" id="sleepWellYes"
                                    value="yes">
                                <label class="form-check-label notbold" for="sleepWellYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sleepWell" id="sleepWellNo"
                                    value="no">
                                <label class="form-check-label notbold" for="sleepWellNo">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">2.8 Approximately, how many hours does your child spend in
                                sleeping?</label>
                            <input type="number" class="form-control" id="sleepingHours">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">2.9 Does your child eat well?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eatingWell" id="eatingWellYes"
                                    value="yes">
                                <label class="form-check-label" for="eatingWellYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eatingWell" id="eatingWellNo"
                                    value="no">
                                <label class="form-check-label" for="eatingWellNo">No</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Impairment</label>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Specifics</label>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Diagnosed/ Undiagnosed</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Physical</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalSpecifics" placeholder="Specifics">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalDiagnosed"
                                    placeholder="Diagnosed/ Undiagnosed">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Learning Disability</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalSpecifics" placeholder="Specifics">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalDiagnosed"
                                    placeholder="Diagnosed/ Undiagnosed">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Mental Disorder</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalSpecifics" placeholder="Specifics">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalDiagnosed"
                                    placeholder="Diagnosed/ Undiagnosed">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Autism Spectrum Disorder</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalSpecifics" placeholder="Specifics">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalDiagnosed"
                                    placeholder="Diagnosed/ Undiagnosed">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Others</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalSpecifics" placeholder="Specifics">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="physicalDiagnosed"
                                    placeholder="Diagnosed/ Undiagnosed">
                            </div>
                        </div>


                    </div>
                    <div class="page" v-show="currentPage === 3">
                        <div class="section-title mb-3">
                            <strong>III. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.1 Did the child enroll in Preschool Level (Playschool,
                                    Nursery, Kindergarten)?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preschoolEnrollment"
                                        id="preschoolYes" value="yes" required>
                                    <label class="form-check-label notbold" for="preschoolYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preschoolEnrollment"
                                        id="preschoolNo" value="no" required>
                                    <label class="form-check-label notbold" for="preschoolNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">3.2 Age of entry to Grade 1:</label>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label notbold">Years:</label>
                                        <input type="number" class="form-control" id="entryYears" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label notbold">Months:</label>
                                        <input type="number" class="form-control" id="entryMonths" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.3 Which subject(s) was the child most likely interested
                                    in?</label>
                                <input type="text" class="form-control" id="interestedSubjects">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.4 Which subject(s) was the child least likely interested
                                    in?</label>
                                <input type="text" class="form-control" id="leastInterestedSubjects">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.5 Describe the child’s relationship with his/her teachers in
                                    Grade School:</label>
                                <textarea class="form-control" rows="3" id="teacherRelationship"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.6 How often did you visit and follow-up your child in
                                    school?</label>
                                <input type="text" class="form-control" id="schoolVisits">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.7 What were the Non-Academic difficulties did your child
                                    encounter in Grade School?</label>
                                <textarea class="form-control" rows="3" id="nonAcademicDifficulties"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.9 How would you rate the child’s social standing with the
                                    other school children?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialStanding" id="veryPopular"
                                        value="Very Popular" required>
                                    <label class="form-check-label notbold" for="veryPopular">Very Popular</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialStanding"
                                        id="averagePopularity" value="Average Popularity" required>
                                    <label class="form-check-label notbold" for="averagePopularity">Average
                                        Popularity</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialStanding" id="likesPopular"
                                        value="Likes to be popular" required>
                                    <label class="form-check-label notbold" for="likesPopular">Likes to be
                                        popular</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialStanding"
                                        id="hardlyNoticed" value="Hardly Noticed" required>
                                    <label class="form-check-label notbold" for="hardlyNoticed">Hardly Noticed</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="socialStanding" id="aloof"
                                        value="Aloof" required>
                                    <label class="form-check-label notbold" for="aloof">Aloof</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.10 Was the child subjected to any disciplinary
                                    action?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="disciplinaryAction"
                                        id="disciplinaryYes" value="Yes" required>
                                    <label class="form-check-label notbold" for="disciplinaryYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="disciplinaryAction"
                                        id="disciplinaryNo" value="No" required>
                                    <label class="form-check-label notbold" for="disciplinaryNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label notbold">If yes, please specify:</label>
                                <textarea class="form-control" rows="3" id="disciplinaryActionDetails"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">3.11 Did your child suffer from bullying?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bullying" id="bullyingYes"
                                        value="Yes" required>
                                    <label class="form-check-label notbold" for="bullyingYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bullying" id="bullyingNo"
                                        value="No" required>
                                    <label class="form-check-label notbold" for="bullyingNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label notbold">If yes, please specify:</label>
                                <textarea class="form-control" rows="3" id="bullyingDetails"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 4">
                        <div class="section-title mb-3">
                            <strong>IV. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">4.1 While studying at the PSHS, where would your child
                                    live?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="familyResidence"
                                        name="livingArrangement" value="Family Residence">
                                    <label class="form-check-label notbold" for="familyResidence">Family
                                        Residence</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="guardiansHome"
                                        name="livingArrangement" value="Guardian’s Home">
                                    <label class="form-check-label notbold" for="guardiansHome">Guardian’s Home</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="schoolDormitory"
                                        name="livingArrangement" value="School Dormitory">
                                    <label class="form-check-label notbold" for="schoolDormitory">School
                                        Dormitory</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label notbold">Others:</label>
                                <input type="text" class="form-control" id="othersResidence">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">4.2 If the child is to stay at the dormitory,</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">4.2.1 Is there someone near PSHS who can be approached to help
                                    the child in his/her studies?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="studyHelpYes" name="studyHelp"
                                        value="Yes">
                                    <label class="form-check-label notbold" for="studyHelpYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="studyHelpNo" name="studyHelp"
                                        value="No">
                                    <label class="form-check-label notbold" for="studyHelpNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">If yes,</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label notbold">Name:</label>
                                <input type="text" class="form-control" id="studyHelperName">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label notbold">Address:</label>
                                <input type="text" class="form-control" id="studyHelperAddress">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label notbold">Contact No.:</label>
                                <input type="text" class="form-control" id="studyHelperContact">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">4.2.2 How often will you be seeing your child?</label>
                                <input type="text" class="form-control" id="seeingChildFrequency">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">4.3 If your child is a city scholar, what will be his/her mode
                                    of transportation in coming to school?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transportation"
                                        id="publicTransportation" value="Public Transportation">
                                    <label class="form-check-label notbold" for="publicTransportation">Public
                                        Transportation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transportation" id="carpool"
                                        value="Carpool">
                                    <label class="form-check-label notbold" for="carpool">Carpool</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transportation"
                                        id="familyVehicle" value="Family-Owned Vehicle">
                                    <label class="form-check-label notbold" for="familyVehicle">Family-Owned
                                        Vehicle</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="page" v-show="currentPage === 5">
                        <div class="section-title mb-3">
                            <strong>V. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">5.1 How much allowance do you plan to give your child?</label>
                                <input type="text" class="form-control" id="allowance" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">5.2 How do you plan to give the allowance?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allowanceFrequency" id="daily"
                                        value="Daily">
                                    <label class="form-check-label notbold" for="daily">Daily</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allowanceFrequency" id="weekly"
                                        value="Weekly">
                                    <label class="form-check-label notbold" for="weekly">Weekly</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allowanceFrequency" id="monthly"
                                        value="Monthly">
                                    <label class="form-check-label notbold" for="monthly">Monthly</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allowanceFrequency" id="stipend"
                                        value="Through the Stipend">
                                    <label class="form-check-label notbold" for="stipend">Through the Stipend</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">5.3 Was it the choice of your child to study in PSHS?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="choicePSHS" id="psYes"
                                        value="Yes">
                                    <label class="form-check-label notbold" for="psYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="choicePSHS" id="psNo" value="No">
                                    <label class="form-check-label notbold" for="psNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">5.4 If you can choose a course/degree/program in college for
                                    your child, what would it be?</label>
                                <input type="text" class="form-control" id="collegeCourse" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">5.5 How can you support your child while studying in
                                    PSHS?</label>
                                <textarea class="form-control" id="support" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name of Father:</label>
                                <input type="text" class="form-control" id="fatherName" required>
                                <label class="form-label mt-3 notbold">Contact No.:</label>
                                <input type="tel" class="form-control" id="fatherContact" required>
                                <label class="form-label mt-3 notbold">Email Address:</label>
                                <input type="email" class="form-control" id="fatherEmail" required>
                                <label class="form-label mt-3 notbold">Signature:</label>
                                <input type="file" class="form-control" id="fatherSignature" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name of Mother:</label>
                                <input type="text" class="form-control" id="motherName" required>
                                <label class="form-label mt-3 notbold">Contact No.:</label>
                                <input type="tel" class="form-control" id="motherContact" required>
                                <label class="form-label mt-3 notbold">Email Address:</label>
                                <input type="email" class="form-control" id="motherEmail" required>
                                <label class="form-label mt-3 notbold">Signature:</label>
                                <input type="file" class="form-control" id="motherSignature" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Name of Guardian:</label>
                                <input type="text" class="form-control" id="guardianName" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label notbold">Relationship with the student:</label>
                                <input type="text" class="form-control" id="guardianName" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label notbold">Home Address:</label>
                                <input type="text" class="form-control" id="guardianHomeAddress" required>
                                <label class="form-label mt-3 notbold">Contact No.:</label>
                                <input type="tel" class="form-control" id="guardianHomeContact" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label notbold">Office Address:</label>
                                <input type="text" class="form-control" id="guardianOfficeAddress" required>
                                <label class="form-label mt-3 notbold">Contact No.:</label>
                                <input type="tel" class="form-control" id="guardianOfficeContact" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="right d-flex flex-column align-items-end bts">
                    <!-- If it's not the last page, show the next button -->
                    <div v-if="currentPage < totalPages" class="col-md-6 mb-2">
                        <button @click="nextPage" class="btn btn-primary btn-submit">Next</button>
                    </div>
                    <!-- If it's the last page, show the submit button -->
                    <div v-else class="col-md-6 mb-2">
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                    <!-- Back button -->
                    <div class="col-md-6">
                        <button @click="prevPage" class="btn btn-outline-primary btn-back">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

let currentPage = ref(1);
const totalPages = 5;
let progress = ref((currentPage.value / totalPages) * 100);

function nextPage() {
    if (currentPage.value < totalPages) {
        currentPage.value++;
    }
}

function prevPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}

watch(currentPage, (newValue) => {
    progress.value = (newValue / totalPages) * 100;
});
</script>

<style scoped>
.container {
    margin-bottom: 40px;
}

.container .text-header {
    margin-bottom: 40px;
    color: #000000b3;
    font: 700 25px Montserrat, sans-serif;
    border-bottom-width: 5px;
}

.left-right {
    width: 100%;
    display: flex;
}

.container .left {
    width: 70%;
    border-radius: 10px;
}

.left .top {
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.left .page {
    background-color: #0b5dd72d;
    padding: 20px 20px 20px 20px;
    border-radius: 10px;
    margin-top: 30px;
}

.left .notbold {
    font-weight: normal;
}

.container .right {
    width: 10%;
}

.container label {
    font-weight: bold;
}

.form-group input,
.form-group textarea,
.form-group select {
    border: 1px solid #9e9e9e;
}

.btns {
    margin-bottom: 50px;
}

.btn-submit {
    width: 250px;
}

.btn-back {
    width: 250px;
    margin-right: 10px;
}

@media screen and (max-width:360px) {
    .container .text-header {
        text-align: center;
        font-size: 20px;
    }

    .left-right {
        flex-direction: column;
        width: 100%;
    }

    .container .left,
    .container .right {
        width: 100%;
    }

    .container .right {
        margin-top: 20px
    }

    .btn-submit {
        width: 100%;
    }

    .btn-back {
        width: 100%;
    }
}
</style>
