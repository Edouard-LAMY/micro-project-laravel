import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// Message error / confirm
const messageErrorValided = document.querySelector('.alert');

if (messageErrorValided) {
    setTimeout(() => {
        messageErrorValided.remove();
    }, 5000);
}

// --------------------------- DELETE POST -----------------------------
const linkDeletePost = document.querySelectorAll('#linkDeletePost');
const deletePost = document.querySelectorAll('#deletePost');

// for linkDeletePost we listen the click
for (let i = 0; i < linkDeletePost.length; ++i) {
    linkDeletePost[i].addEventListener('click', function (e) {
        e.preventDefault();
        // foreach form we search the form target for delete the post
        for (let j = 0; j < deletePost[i].length; ++j) {
            // we delete the target post 
            deletePost[i].submit();
        }
    })
}
// ----------------------------------

// ------------ CURSOR ---------------
let changeCursor = document.querySelector('.changeCursor');
let allButton = document.querySelector('button');
let allLink = document.querySelectorAll('a');
let html = document.querySelector('html');
let cursor = document.querySelector('.cursor');
let cursorinner = document.querySelector('.cursor2');
cursor.classList.add('hidden');
cursorinner.classList.add('hidden');


let clickOn = true;
changeCursor.addEventListener('click', function handleClick() {
    if (clickOn) {
        cursor.classList.remove('hidden');
        cursorinner.classList.remove('hidden');
        allButton.classList.add('cursorNone');
        // add class for all link
        for (let i = 0; i < allLink.length; ++i) {
            allLink[i].classList.add('cursorNone');
        }
        html.classList.add('cursorNone');

        document.addEventListener('mousemove', function (e) {
            let x = e.clientX;
            let y = e.clientY;
            cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
        });

        document.addEventListener('mousemove', function (e) {
            let x = e.clientX;
            let y = e.clientY;
            cursorinner.style.left = x + 'px';
            cursorinner.style.top = y + 'px';
        });

        document.addEventListener('mousedown', function () {
            cursor.classList.add('click');
            cursorinner.classList.add('cursorinnerhover')
        });

        document.addEventListener('mouseup', function () {
            cursor.classList.remove('click')
            cursorinner.classList.remove('cursorinnerhover')
        });

        clickOn = false;
        // console.log('active');
    } else {
        // console.log('desactive');
        clickOn = true;
        allButton.classList.remove('cursorNone');
        html.classList.remove('cursorNone');
        // remove class for all link
        for (let i = 0; i < allLink.length; ++i) {
            allLink[i].classList.remove('cursorNone');
        }
        cursor.classList.add('hidden');
        cursorinner.classList.add('hidden');
    }
})

// ----------------------------------