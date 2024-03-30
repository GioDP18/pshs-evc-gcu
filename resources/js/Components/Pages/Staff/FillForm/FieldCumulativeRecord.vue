<template>
    <div>
        <div class="container">
            <div class="text-header">PARENT QUESTIONNAIRE FORM</div>
            <div class="left-right">
                <div class="left">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }"
                            aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">{{ Math.floor(progress) }}%
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 1">
                        <div class="section-title mb-3">
                            <strong>I. A. PERSONAL INFORMATION</strong>
                        </div>

                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus:</label>
                            <input type="text" class="form-control" id="campus" required>
                        </div>
                        <div class="mb-3">
                            <label for="campus" class="form-label">Upload your image (Must be 1 by 1).</label>
                            <input type="file" class="form-control" id="campus" required>
                        </div>
                        <div class="mb-3">
                            <label for="childName" class="form-label me-3">Name:</label>
                            <div class="d-flex">
                                <input type="text" class="form-control me-3" placeholder="Family Name"
                                    id="childLastName" required>
                                <input type="text" class="form-control me-3" placeholder="First Name"
                                    id="childFirstName" required>
                                <input type="text" class="form-control" placeholder="Middle Name" id="childMiddleName"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="contactNo" class="form-label">Contact No.:</label>
                                <input type="number" class="form-control" id="contactNo" required>
                            </div>
                            <div class="col">
                                <label for="religion" class="form-label">Religion:</label>
                                <input type="text" class="form-control" id="religion" required>
                            </div>
                            <div class="col">
                                <label for="cellNo" class="form-label">Cell No.:</label>
                                <input type="number" class="form-control" id="cellNo" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="emailaddress" required>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="age" required>
                            </div>
                            <div class="col">
                                <label for="dateOfBirth" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" id="dateOfBirth" required>
                            </div>
                            <div class="col">
                                <label for="cellNo" class="form-label">Nationality:</label>
                                <input type="text" class="form-control" id="cellNo" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="age" class="form-label">Place of Birth:</label>
                                <input type="text" class="form-control" id="age" required>
                            </div>
                            <div class="col">
                                <label for="dateOfBirth" class="form-label">Permanent Address:</label>
                                <input type="text" class="form-control" id="dateOfBirth" required>
                            </div>
                        </div>

                        <div class="section-title mb-3">
                            <strong>B.</strong>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">Name:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">Age:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">Educational Attainment:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">School last attended:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">Occupation:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="familyName" class="form-label">Company Address:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="familyName" placeholder="Father"
                                        required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="firstName" placeholder="Mother"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="maritalStatus" class="form-label">Parent’s Marital Status:</label>
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchYes"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchYes">Married in
                                            Church</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Married
                                            Civily</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold"
                                            for="marriedInChurchNo">Separated</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Divorce</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Widowed</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="others" class="form-label notbold">Others (specify):</label>
                            <input type="text" class="form-control" id="others" required>
                        </div>

                        <div class="table-responsive rounded">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Brothers/Sisters</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Educational Attainment</th>
                                        <th scope="col">School</th>
                                        <th scope="col">Occupation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input style="width: 80px;" type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input style="width: 80px;" type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input style="width: 80px;" type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input style="width: 80px;" type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input style="width: 80px;" type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <label for="maritalStatus" class="form-label">Socio-economic level of the family:</label>
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchYes"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchYes">Very
                                            High</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">High</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Middle</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Low</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="marriedInChurchNo"
                                            name="maritalStatus" required>
                                        <label class="form-check-label notbold" for="marriedInChurchNo">Very Low</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 2">
                        <div class="section-title mb-3">
                            <strong>II. HEALTH AND PHYSICAL DEVELOPMENT</strong>
                        </div>

                        <div class="table-responsive rounded">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Height</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Weight
                                                (kg.)</label>
                                        </td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Sight</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Hearing</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Speech</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">General
                                                Health</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input ml-4"
                                                id="height7" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Have you experienced any serious sickness or accident in the
                                past?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment"
                                    id="preschoolYes" value="yes" required>
                                <label class="form-check-label notbold" for="preschoolYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment" id="preschoolNo"
                                    value="no" required>
                                <label class="form-check-label notbold" for="preschoolNo">No</label>
                            </div>
                            <div class="mb-3">
                                <label for="others" class="form-label notbold">Others (specify):</label>
                                <input type="text" class="form-control" id="others" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Any handicap/allergy/ailment?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment"
                                    id="preschoolYes" value="yes" required>
                                <label class="form-check-label notbold" for="preschoolYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment" id="preschoolNo"
                                    value="no" required>
                                <label class="form-check-label notbold" for="preschoolNo">No</label>
                            </div>
                            <div class="mb-3">
                                <label for="others" class="form-label notbold">Specify (e.g. asthma):</label>
                                <input type="text" class="form-control" id="others" required>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 3">
                        <div class="section-title mb-3">
                            <strong>III. RESIDENCE</strong>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">Indicate your place of residence with a
                                check:</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Family Home</label>
                                        </td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Guardian’s
                                                home</label>
                                        </td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">School
                                                dormitory</label></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Others:
                                                (specify)</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">How do you get to school?</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Public
                                                transportation</label></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Family-owned
                                                vehicle</label>
                                        </td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Car-pool</label></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Service</label></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                        <td class="align-middle" style="width: 120px;"><input type="checkbox"
                                                class="form-input ml-4" id="height7" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Others:
                                                (specify)</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Do you come to school with bodyguards?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment"
                                    id="preschoolYes" value="yes" required>
                                <label class="form-check-label notbold" for="preschoolYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preschoolEnrollment" id="preschoolNo"
                                    value="no" required>
                                <label class="form-check-label notbold" for="preschoolNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 4">
                        <div class="section-title mb-3">
                            <strong>IV. EDUCATIONAL BACKGROUND</strong>
                        </div>

                        <div class="mb-3">
                            <label for="schoolAttended" class="form-label">School last attended:</label>
                            <div class="row align-items-center">
                                <div class="col">
                                    <input type="text" class="form-control" id="schoolAttended">
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType" id="publicSchool"
                                            value="public">
                                        <label class="form-check-label" for="publicSchool">Public</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType"
                                            id="privateSchool" value="private">
                                        <label class="form-check-label" for="privateSchool">Private</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="schoolAttended" class="form-label">School Address:</label>
                            <div class="row align-items-center">
                                <div class="col">
                                    <input type="text" class="form-control" id="schoolAttended">
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType" id="publicSchool"
                                            value="public">
                                        <label class="form-check-label" for="publicSchool">COED</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType"
                                            id="privateSchool" value="private">
                                        <label class="form-check-label" for="privateSchool">Exclusive</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="schoolAttended" class="form-label">Honors/Awards Received:</label>
                            <div class="row align-items-center">
                                <div class="col">
                                    <input type="text" class="form-control" id="schoolAttended">
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType" id="publicSchool"
                                            value="public">
                                        <label class="form-check-label" for="publicSchool">Sectarian</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="schoolType"
                                            id="privateSchool" value="private">
                                        <label class="form-check-label" for="privateSchool">Non-Sect</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="gradeLevel" class="form-label">Grade Level</label>
                                    <input type="text" class="form-control mb-3" id="gradeLevel">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" class="form-control mb-3" id="section">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label for="scholarshipStatus" class="form-label">Scholarship Status</label>
                                    <input type="text" class="form-control mb-3" id="scholarshipStatus">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label for="academicStatus" class="form-label">Academic Status</label>
                                    <input type="text" class="form-control mb-3" id="academicStatus">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                    <input type="text" class="form-control mb-3">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive rounded">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject you like
                                                best</label>
                                        </td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject you like
                                                least</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject you find
                                                difficulty</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject where you
                                                learned most</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject where you
                                                learned least</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject that was taught
                                                best</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Subject that was taught
                                                worst</label></td>
                                        <td><input type="number" class="form-control" required>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="page" v-show="currentPage === 5">
                        <div class="section-title mb-3">
                            <strong>V. SOCIAL PROFILE</strong>
                        </div>
                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">Do you have real friends: (please answer Yes or
                                No)</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Of your age?</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Older than
                                                you?</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">Younger than
                                                you?</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">Are most of your friends: (please answer Yes or
                                No)</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Boys?</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold"
                                                for="marriedInChurchNo">Girls?</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">From another
                                                school?</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="marriedInChurchNo">From this
                                                school?</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">List down your best friends at PSHS</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">List down your hobbies, special talents, skills,
                                interests or leisure time activities</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 6">
                        <div class="section-title mb-3">
                            <strong>VI. STUDENT’S SELF-ASSESSMENT</strong>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">Do you have real friends: (please answer Yes or
                                No)</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label" for="height">PHYSICAL WELL-BEING
                                                <span style="font-weight: 400; font-size: 14px;"> (appearance, health,
                                                    grooming)</span>
                                            </label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label" for="marriedInChurchNo">MENTAL<br><span
                                                    style="font-weight: 400; font-size: 14px;"> (Comprehension,
                                                    Reasoning
                                                    & Judgement, Alertness)</span></label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label" for="marriedInChurchNo">SPEECH<br><span
                                                    style="font-weight: 400; font-size: 14px;"> (fluency,
                                                    diction, voice, manner of expression, spontaneity of thoughts | * In
                                                    English * In Filipino)</span></label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label" for="marriedInChurchNo">WRITTEN
                                                COMMUNICATION SKILLS<br><span
                                                    style="font-weight: 400; font-size: 14px;">(Legibility and neatness,
                                                    grammatical structure, depth of thought,
                                                    organization)</span></label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label" for="marriedInChurchNo">PERSONALITY<br><span
                                                    style="font-weight: 400; font-size: 14px;">(Self-confidence, social
                                                    graces, attitude and values, interpersonal skills, emotional
                                                    adaptability)</span></label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label" for="marriedInChurchNo">PERSONALITY<br><span
                                                    style="font-weight: 400; font-size: 14px;"> (Integrity, Industry &
                                                    Resourcefulness, Observance of School Rules & Regulation,
                                                    Cooperation,
                                                    Responsibility, Respect for Others & Property)</span></label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label for="others" class="form-label">Underline any of the following words which describe
                                your general make-up:</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col" class="striped">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col" class="striped">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col" class="striped">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td v-for="(grade, gradeIndex) in grades" :key="gradeIndex"
                                            :class="{ 'striped': gradeIndex % 2 === 0 }">
                                            <p class="word-line" v-for="(word, index) in grade" :key="index"
                                                @click="toggleUnderline(gradeIndex, index)"
                                                :class="{ 'underlined': isUnderlined[gradeIndex][index] }">
                                                {{ word }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- GRADE 7 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 7</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                        <!-- GRADE 8 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 8</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                        <!-- GRADE 9 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 9</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                        <!-- GRADE 10 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 10</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                        <!-- GRADE 11 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 11</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                        <!-- GRADE 12 -->
                        <div class="mb-3">
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 12</label>
                                <p style="font-weight: 700;">Complete the following statements:</p>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My father and my mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My greatest mistake:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I wish my parents were:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">In school my teachers:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I like friends because:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">Compared with most families,
                                    mine:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I always wanted to:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">I feel that my father:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">At school I get along with:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                            <div>
                                <label for="campus" class="form-label notbold">My mother:</label>
                                <input type="text" class="form-control" id="campus" required>
                            </div>
                        </div>

                    </div>
                    <div class="page" v-show="currentPage === 7">
                        <div class="section-title mb-3">
                            <strong>VII. EXTRA CURRICULAR ACTIVITIES</strong>
                        </div>

                        <div class="mb-4">
                            <label for="others" class="form-label" style="text-decoration: underline;">POSITION HELD IN
                                SCHOOL/OFF-CAMPUS ORGANIZATIONS</label>

                            <!-- Grade 7 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 7</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required>
                                                </td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 8 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 8</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 9 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 9</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 10 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 10</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 11 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 11</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 12 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 12</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">POSITION (President, Vice Pres., Member, etc.)</th>
                                                <th scope="col">ORGANIZATION/CLUB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="others" class="form-label" style="text-decoration: underline;">INVOLVEMENT IN
                                ACTIVITIES/PROJECTS IN/OFF CAMPUS</label>

                            <!-- Grade 7 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 7</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 8 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 8</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 9 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 9</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 10 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 10</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 11 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 11</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 12 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 12</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">ACTIVITY</th>
                                                <th scope="col" style="text-align: center;">EXTENT OF ACTIVITY<br><span
                                                        style="font-weight: 400; font-size: 14px;">(International,
                                                        National,
                                                        School-wide, Year-level, Others)</span></th>
                                                <th scope="col" style="text-align: center;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 14px;">(Organizer,
                                                        representative, Participant)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="others" class="form-label" style="text-decoration: underline;">SPECIAL ACADEMIC
                                HONORS/AWARDS/DISTINCTIONS RECEIVED</label>

                            <!-- Grade 7 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 7</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 8 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 8</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 9 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 9</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 10 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 10</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 11 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 11</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 12 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 12</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">AWARD</th>
                                                <th scope="col" style="text-align: center;">ACTIVITY/COMPETITION/ETC.
                                                </th>
                                                <th scope="col" style="text-align: center;">CLASSIFICATION<br><span
                                                        style="font-weight: 400; font-size: 14px;">(School-wide,
                                                        regional, national, international, etc.)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="others" class="form-label" style="text-decoration: underline;">PARTICIPATION IN
                                SEMINARS/CONFERENCES/CONTESTS/COMPETITIONS</label>

                            <!-- Grade 7 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 7</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 8 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 8</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 9 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 9</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 10 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 10</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 11 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 11</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Grade 12 -->
                            <div>
                                <label for="others" class="form-label" style="font-size: 20px;">GRADE 12</label>
                                <div class="table-responsive rounded">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center; font-size: 12px;">TITLE OF
                                                    SEMINAR/CONFERENCE/<br>CONTEST/COMPETITION</th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SPONSORING
                                                    AGENCY/DATE HELD
                                                </th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">SCOPE OF
                                                    SEMINAR/<br>CONFERENCE/CONTEST/COMPETITION<br><span
                                                        style="font-weight: 400; font-size: 10px;">(International,
                                                        National, Regional, School, Others)</span></th>
                                                <th scope="col" style="text-align: center; font-size: 12px;">NATURE OF
                                                    INVOLVEMENT<br><span
                                                        style="font-weight: 400; font-size: 10px;">(Speaker,
                                                        Facilitator, Participant, Team Captain, Member)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                                <td><input type="text" class="form-control" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 8">
                        <div class="section-title mb-3">
                            <strong>VIII. VOCATIONAL PLANNING</strong>
                        </div>
                        <div class="table-responsive rounded">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">1st</label></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">2nd</label></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                        <td><textarea type="text" class="form-control" required></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <label for="counselor" class="form-label">Year Level Counselor:</label>
                            <input type="text" class="form-control" id="counselor" required>
                        </div>
                    </div>
                    <div class="page" v-show="currentPage === 9">
                        <div class="section-title mb-3">
                            <strong>IX. PSYCHOLOGICAL TEST PROFILE (to be filled-up by the Guidance Counselor)</strong>
                        </div>

                        <div class="section-title mb-3">
                            <strong style="font-style: italic;">Mental Ability</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Culture Fair</label>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label notbold">Raw Score</label>
                                    <input type="text" v-model="cultureFairRawScore" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">DIQ</label>
                                    <input type="text" v-model="DIQ" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">%ile</label>
                                    <input type="text" v-model="percentile" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">Description</label>
                                    <input type="text" v-model="cultureFairDescription" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">OLMAT</label>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label notbold">Raw Score</label>
                                    <input type="text" v-model="olmatRawScore" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">IQ</label>
                                    <input type="text" v-model="IQ" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">%ile</label>
                                    <input type="text" v-model="olmatPercentile" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label notbold">Description</label>
                                    <input type="text" v-model="olmatDescription" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive rounded">
                            <label class="form-label" style="font-style: italic;">Aptitude</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">VR</th>
                                        <th scope="col">NA</th>
                                        <th scope="col">VR+NA</th>
                                        <th scope="col">AR</th>
                                        <th scope="col">MR</th>
                                        <th scope="col">SR</th>
                                        <th scope="col">S</th>
                                        <th scope="col">L</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Raw Score</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Percentile</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Description</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label class="form-label" style="font-style: italic;">Study Habits and Attitudes</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Daily Avoidance</th>
                                        <th scope="col">Work Methods</th>
                                        <th scope="col">Study Habits</th>
                                        <th scope="col">Teacher Approval</th>
                                        <th scope="col">Education Acceptance</th>
                                        <th scope="col">Study Attitude</th>
                                        <th scope="col">Study Orientation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Raw Score</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Percentile</label></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" for="height">Description</label>
                                        </td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label class="form-label" style="font-style: italic;">Problem Checklist</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Grade 7</th>
                                        <th scope="col">Grade 8</th>
                                        <th scope="col">Grade 9</th>
                                        <th scope="col">Grade 10</th>
                                        <th scope="col">Grade 11</th>
                                        <th scope="col">Grade 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                        <td><input type="text" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive rounded">
                            <label class="form-label" style="font-style: italic;">Problem Checklist</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Low Score Description</th>
                                        <th scope="col">1</th>
                                        <th scope="col">2</th>
                                        <th scope="col">3</th>
                                        <th scope="col">4</th>
                                        <th scope="col">5</th>
                                        <th scope="col">6</th>
                                        <th scope="col">7</th>
                                        <th scope="col">8</th>
                                        <th scope="col">9</th>
                                        <th scope="col">10</th>
                                        <th scope="col">High Score Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">RESERVED, detached,
                                                critical, cool</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">OUTGOING, warmhearted,
                                                easy-going, participating</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">LESS INTELLIGENT, concrete-thinking</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">MORE INTELLIGENT, ABSTRACT-THINKING, bright</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">AFFECTED BY FEELINGS, emotionally less stable, easily upset, changeable</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">EMOTIONALLY STABLE, faces reality, calm</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">PHLEGMATIC, deliberate, inactive, stodgy</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">EXCITABLE, IMPATIENT, DEMANDING, OVERACTIVE</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">OBEDIENT, mild, conforming</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">ASSERTIVE, independent, aggressive, stubborn</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">SOBER, prudent, serious, taciturn</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">HAPPY-GO-LUCKY, Heedless, gay, enthusiastic</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">DISREGARDS RULES, undependable, by-passes obligations</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">CONCIENTIOUS, persevering, staid, rule-bound</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">SHY, restrained, diffident, timid</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">VENTURESOME, socially bold, uninhibited, spontaneous</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">TOUGH-MINDED, self-reliant, realistic, no-nonsense</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">TENDER-MINDED, dependent, over-protected, sensitive</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">VIGOROUS, goes readily with group, zestful, given to action</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">DOUBTING, obstructive, individualistic, reflective, internally restrained, unwilling to act</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">SELF-ASSURED, placid, secure, serene</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">APPREHENSIVE, worrying, depressive, troubled</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">GROUP-DEPENDENT, a “joiner” and sound follower</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">SELF-SUFFICIENT, prefers own decisions, resourceful</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">CASUAL, careless of social rules, untidy, follows own urges</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">CONTROLLED, socially-precise, self-disciplined, compulsive</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">RELAXED, tranquil, torpid, unfrustrated</label></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td class="align-middle"><input type="checkbox" class="form-input" id="height7"
                                                required></td>
                                        <td><label class="form-check-label notbold" style="font-size: 14px;" for="height">TENSE, driven, overwrought, fretful</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="right">
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
const totalPages = 9;
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

const words = [
    'Persevering', 'Calm', 'Friendly', 'Patient', 'Stubborn', 'Capable', 'Tolerant', 'Impulsive',
    'Pessimistic', 'Jealous', 'Shy', 'Talented', 'Self-confident', 'Quick-tempered', 'Cynical',
    'Tactful', 'Submissive', 'Conscientious', 'Poor health', 'Cheerful', 'Excitable', 'Irritable',
    'Anxious', 'Nervous', 'Unhappy', 'Frequent daydreaming', 'Easily exhausted', 'Unhappy',
    'Frequent periods of gloom or depression'
];

const grades = ref(Array.from({ length: 6 }, () => words));

const isUnderlined = ref(Array.from({ length: grades.value.length }, () => words.map(() => false)));

const toggleUnderline = (gradeIndex, wordIndex) => {
    isUnderlined.value[gradeIndex][wordIndex] = !isUnderlined.value[gradeIndex][wordIndex];
};
</script>

<style scoped>
.word-line {
    cursor: pointer;
}

.striped {
    background-color: #dddddd;
}

.underlined {
    text-decoration: underline;
}

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
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.container .left {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 30px;
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
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.container label {
    font-weight: bold;
}

.form-group input,
.form-group textarea,
.form-group select {
    border: 1px solid #9e9e9e;
}

.input-table {
    background-color: white;
}

.input-table:focus {
    border: 1px solid #9e9e9e !important;
    background-color: white !important;
}

.rounded {
    border-radius: 10px;
}

.btn-submit {
    width: 100%;
}

.btn-back {
    width: 100%;
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
