<?php
function group1()
{
    // 5: instructor
    return ['5'];
}
function group2()
{
    // 4: students
    return ['4'];
}
function group3()
{
    // 2: administrator, 1: admin, 3: PIC
    return ['2', '1', '3'];
}

function role_available()
{
    // 4: instructor, 6:students
    return ['4', '6'];
}

// in_array
function canAddModul($role)
{
    if (in_array($role, group1())) {
        return true;
    }
}