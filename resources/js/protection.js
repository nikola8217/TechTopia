const userRole = localStorage.getItem('role_id') ? localStorage.getItem('role_id') : null;

function checkIsAuth(to, from, next) {
    if (!userRole) {
      next('/login');
    } else if (userRole === '2') {
      next('/users');
    } else if (userRole === '3') {
      next('/blogsManager');
    } else {
      next();
    }
  }
  
  function checkIsGuest(to, from, next) {
    if (userRole) {
      if (userRole === '1') {
        next('/');
      } else if (userRole === '2') {
        next('/users');
      } else if (userRole === '3') {
        next('/blogsManager');
      }
    } else {
      next();
    }
  }
  
  function checkIsAdmin(to, from, next) {
    if (!userRole) {
      next('/login');
    } else if(userRole === '1') {
      next('/');
    } else if(userRole === '3') {
      next('/blogsManager');
    } else {
      next();
    }
  }
  
  function checkIsManager(to, from, next) {
    if (!userRole) {
      next('/login');
    } else if(userRole === '1') {
      next('/');
    } else if(userRole === '2') {
      next('/users');
    } else {
      next();
    }
  }
  
  function checkIsGuestOrUser(to, from, next) {
    if (userRole && userRole === '2') {
      next('/users');
    } else if (userRole && userRole === '3') {
      next('/blogsManager')
    } else {
      next();
    }
  }

  export {
    checkIsAuth,
    checkIsGuest,
    checkIsAdmin,
    checkIsManager,
    checkIsGuestOrUser
  }