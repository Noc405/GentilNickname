function confirmDelete(id){
    var buttonDelete = document.querySelectorAll('.deleteButton');
    var backgroud = document.querySelector('.backgroudDiv');
    var confirmBox = document.querySelector('.confirmDelete');
    var body = document.querySelector('body');

    var btnConfirm = document.querySelector('.confirm');
    var btnCancel = document.querySelector('.cancel');

    buttonDelete.forEach(element => {
        element.addEventListener('click', () => {
            backgroud.style.display = 'block';
            confirmBox.style.display = 'block';
            body.style.overflowY = 'hidden';
            confirmBox.style.top = window.scrollY + 300 + 'px';
            
            confirmBox.style.transform = 'scale(1)';
        });
    });

    btnConfirm.addEventListener('click', () => {
        backgroud.style.display = 'none';
        confirmBox.style.display = 'none';
        body.style.overflowY = 'visible';

        confirmBox.style.transform = 'scale(1.1)';

        window.location.href = "../php/deleteTeacher.php?id=" + id;
    });

    btnCancel.addEventListener('click', () => {
        backgroud.style.display = 'none';
        confirmBox.style.display = 'none';
        body.style.overflowY = 'visible';

        confirmBox.style.transform = 'scale(1.1)';
    });
}