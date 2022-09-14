function interviewQuestion(name){
    var welcome = 'Welcome on board '
    return function(job){
        if (job === 'teacher'){
            console.log(welcome + 'What Subject do you teach? '+ name)
        }else if(job === 'designer'){
            console.log(welcome + ' What is UX Design? '+ name); 
        }else{
            console.log(welcome +' What do you do? '+ name); 
        }
    }
}
//interviewQuestion('Adex')('designer')
//CALL BACK FUNCTION
var score = [45, 56,78,89,45,56];

function callGpa(arr, fn){
    let points = []
    for(let i=0; i<=arr.length; i++){
        points.push(fn(arr[i]))
    }
    return points;
}

function getPoint(el){
    let pt;
    if(el <= 40){
        pt = 0
    }
    else if(el >=40 && el <=50){
        pt = 2
    }
    else if(el>50 && el<=60){
        pt = 3
    }
    else if(el > 60 && el<=70 ){
        pt= 4
    }
    else if (el >70 && el<=100){
        pt =5
    }
    else{
        pt= -1
    }
    return pt;
}

//get Grade
function getGrade(el){
    let grd;
    switch (el) {
        case 0:
            grd = 'F'
            break;
        case 2:
            grd = 'E'
            break;
        case 3:
            grd = 'C'
            break;
        case 4:
            grd = 'B'
            break;
        case 5:
            grd = 'A'
            break;
        case -1:
            grd = 'None'
            break;
    
        // default:
        //     grd = 'None'
        //     break;
    }
    return grd;
}

// let Point = callGpa(score, getPoint)
// console.log(Point);

// let grade = callGpa(Point, getGrade)
// console.log(grade);

//USE Call, Apply and Bind
let std1 = {
    name: 'Adebola Azeez',
    class: 'ND1',
    age: 23,
    department: 'Computer Science',
    score: [56,78,66,98,44],
    getPoint: function(score){
        return 
    }
    
}
score: [56,78,66,98,44]
let newScore = score.map((x,i)=> x *= 2)
console.log(newScore);


