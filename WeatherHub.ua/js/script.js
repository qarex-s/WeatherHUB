
function SearchFetch(){
    var form = document.querySelector('form');
    var searchButton = document.querySelector('#buttonSearch');
    
    // Слухаємо подію кліку на кнопку пошуку
    searchButton.addEventListener('click', (e) => {
      e.preventDefault(); 
    
      var userName = document.querySelector('#searchInput').value;
    
      // Виконуємо запит за допомогою fetch
      fetch(`/controller/Home/SearchController.php?userName=${userName}`)
        .then(response => response.text())
        .then(data => {
          // Оновлюємо вміст блоку "gettingUserData" з отриманими даними
          var userDataContainer = document.querySelector('#gettingUserData');
          userDataContainer.outerHTML  = data;
        })
        .catch(error => {
          console.error('Під час виконання запиту сталася помилка:', error);
        });
    });
    
}
