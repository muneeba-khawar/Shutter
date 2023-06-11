function addAbout()
{
    let btn=document.getElementById('aboutbtn');
    btn.remove();

    let input1=document.createElement('input');
    input1.setAttribute('type',"text");
    input1.setAttribute('name',"aboutText");
    input1.setAttribute('id',"aboutText");

    let input2=document.createElement('input');
    input2.setAttribute('type',"submit");
    input2.setAttribute('name','save');
    input2.setAttribute('value','save');
    input2.setAttribute('class','btn');


    let elm=document.getElementById('aboutform');
    elm.appendChild(input1);
    elm.appendChild(input2);

}

function addProfilePicture()
{
    let btn=document.getElementById('editProfilePicturebtn');
    btn.remove();

    let input1=document.createElement('input');
    input1.setAttribute('type',"file");
    input1.setAttribute('name',"profilePicture");
    input1.setAttribute('required', '');

    let input2=document.createElement('input');
    input2.setAttribute('type',"submit");
    input2.setAttribute('name','submitProfilePicture');
    input2.setAttribute('value','upload profile picture');
    input2.setAttribute('class','btn');

    let elm=document.getElementById('profilePictureform');
    elm.appendChild(input1);
    elm.appendChild(input2);
}

function addFeedPicturePicture()
{
    let btn=document.getElementById('postFeedPicturebtn');
    btn.remove();

    let input1=document.createElement('input');
    input1.setAttribute('type',"file");
    input1.setAttribute('name',"uploadedPicture");
    input1.setAttribute('required', '');

    let linebreak1=document.createElement('br');
    let linebreak2=document.createElement('br');

    let input2=document.createElement('input');
    input2.setAttribute('type','text');
    input2.setAttribute('name',"tag");
    input2.setAttribute('id',"tag");
    input2.setAttribute('placeholder',"write a caption");

    let input3=document.createElement('input');
    input3.setAttribute('type',"submit");
    input3.setAttribute('name','submit');
    input3.setAttribute('value','post');
    input3.setAttribute('class','btn');


    let elm=document.getElementById('feedPictureForm');
    elm.appendChild(input1);
    elm.appendChild(linebreak1);
    elm.appendChild(input2);
    elm.appendChild(linebreak2);
    elm.appendChild(input3);
}

function showSection(sectionId)
{
    console.log("working");
    let sections = document.querySelectorAll(".section");
    sections.forEach(function(section){
        section.classList.remove('active');
    });

    let selectedSection = document.getElementById(sectionId);
    selectedSection.classList.add('active');

}