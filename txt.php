<?php
                    $s_no = 1;
                    foreach($assignmentRows as $assignmentRow){
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->dateOfSubm);
                        $dateOfSubm = $date->format('d-m-Y H:i:s');

                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $assignmentRow->submDeadline);
                        $submDeadline = $date->format('d-m-Y H:i:s');
                        echo '<tr>';
                            echo '<td>';
                                echo $s_no;
                            echo '</td>';
                            echo '<td>';
                                echo $assignmentRow->assignTitle;
                            echo '</td>';
                            echo '<td>';
                                echo $assignmentRow->courseId." ".$assignmentRow->courseName;
                            echo '</td>';

                            echo '<td>';
                                echo $submDeadline;
                            echo '</td>';
                            echo '<td>';
                                echo '<a href="student_submit_assign.php?'.$assignmentRow->assignmentId.'">View</a>';
                            echo '</td>';
                        echo '</tr>';
                        $s_no ++;
                    }
                ?>
            </table>


            