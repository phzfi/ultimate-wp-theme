# Ultimate Wordpress Theme
This is one of the first actually great Wordpress themes created at PHZ Full Stack Oy.
  
## Requirements
 - [Virtualbox](https://www.virtualbox.org)
 - [Vagrant](https://www.vagrantup.com/)
 - [vagrant-hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
   
## Initial steps
1. `vagrant up`
2. Navigate to http://wordpress.local

## Concept
    
## Building assets
Just run `npm run dev` or `npm run prod` for production

## Usage
- [Bulma](https://bulma.io)

## Contents

- `assets/`  
These contain every asset used in the project. Including images, js and scss.

  - `assets/scss/`  
  Scss, done with [BEM -workflow](https://css-tricks.com/bem-101/) and a perfect codebase.
    
    - `assets/scss/app.scss`  
    Contains only imports and sitewide generic stylings
    
  - `assets/scss/components/`  
    Every HTML element combination on a website can be considered as a reusable component.  
    This is where we have the styling for those components.
    
  - `assets/scss/core/`  
    Core styling and useful variables.
    
    - `assets/scss/core/_colors.scss`  
    All colors named with [HEX Name Generator](http://chir.ag/projects/name-that-color/)
    
    - `assets/scss/core/_typography.scss`  
    Sitewide typography stylings

- `index.php`  
Default template, used only for the front page

- `header.php`  
Header that's used on every page

- `footer.php`  
Footer that's used on every page
