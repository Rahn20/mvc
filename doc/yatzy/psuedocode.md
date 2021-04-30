
Set SESSIONS to null
Get POST values
Set session['number'] to 0

REPEAT 
    IF submit == "Kasta" THEN
        increase session['number'] with 1
        Roll the dices
        save the values in sessions

    ELSEIF submit == "Behålla" THEN
        Save the keepDices in session

    ELSEIF submit == "Spara" THEN
        save the saveDices in session

    ENDIF

    use sessions to print out the result

UNTIL session['number'] == 2


