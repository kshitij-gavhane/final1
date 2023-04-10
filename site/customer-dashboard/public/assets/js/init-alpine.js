function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
  }
}



var appImg;
var imageId;
var input = document.querySelector("#input");
var img;
//setup of initial table
var setup =
  "<table><tr><th>Name</th><th>Image</th><th>Size</th><th>Type</th><th>Last Modification Date</th></tr>";
input.addEventListener("change", showFileMetadata, false);

//loads file info into table
function showFileMetadata() {
  var files = input.files;
  for (i = 0; i < files.length; i++) {
    imageId = "img" + i;
    setup +=
      "<tr><td>" +
      files[i].name +
      '</td><td id="' +
      imageId +
      '"></td><td>' +
      files[i].size +
      " bytes </td><td>" +
      files[i].type +
      "</td><td>" +
      files[i].lastModifiedDate +
      "</td></tr>";
  }
  setup += "</table>";
  console.log(setup);
  document.querySelector("#table").innerHTML = setup;
  //completes table
  setup =
    "<table><tr><th>Name</th><th>Image</th><th>Size</th><th>Type</th><th>Last Modification Date</th></tr>";
  addThumbnail();
}
//update image sources
function addThumbnail() {
  var files = input.files;
  
  for (var i = 0; i < files.length; i++) {
    imageId = "img" + i;
    
    console.log(img);
    
   var img = document.createElement("img");
      img.src = window.URL.createObjectURL(files[i]);

      img.height = 60;
      img.onload = function() {
        window.URL.revokeObjectURL(this.src);
      }
      document.getElementById(imageId).appendChild(img);
  }
}
