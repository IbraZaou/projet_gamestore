
// FERMETURE POP UP MODIFICATION

document.querySelector('#close-modif').onclick = () =>{
    document.querySelector('.modif-produit').style.display = 'none';
    window.location.href = 'dashboard_pdt.php';
};




// // DRAG AND DROP

// const drop = document.querySelector('.drop');

// drop.addEventListener('dragover', (e) => {
//     e.preventDefault();
//     drop.classList.add('hover');
// });

// drop.addEventListener('dragleave', () => {
//     drop.classList.remove('hover');
// });

// drop.addEventListener('drop', (e) => {
//     e.preventDefault();

//     const image = e.dataTransfer.files[0];
//     const type = image.type;
    
//     if(type=="image/png") {
//         return upload(image);
//     } else {
//         drop.setAttribute('class', 'drop invalid');
//         drop.innerText = "Veuillez insérer le format PNG uniquement."

//         return false;
//     }
// });

// const upload = (image) => {
//     drop.setAttribute('class', 'drop valid');
//     drop.innerText = "Vous avez ajouté " + image.name;
// }