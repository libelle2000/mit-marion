# mit-marion.de

This is a pro bono project for supporting my sister :-).

## Main focus 

Main focus was, to create a website from scratch, that works a bit different from all the Wordpress sites out there.
And that's not only regarding content but also in tech:

- no framework - pure PHP 7.4
- plain HTML5 and CSS
- Vanilla JS - not even jQuery 

## No shortcuts?

Okay, I did some:

- composer takes care of autoloading
- template engine Twig ensures a nice and clean separation of view and model

## What else?

### Routing

There is no routing. Just good old directory structure. 

What? 

Yea... 

Look at my SOLID coding style any guess how much work it is to create a routing. 
You have no clue? I do! I did it already and decided not to put that effort into this project. 
The site is quite small and the effort is just not worth it.     

### SOLID

I tried to create some reliable code. In most cases, I am happy with the result as I followed the SOLID principles. 
But it can always be improved. There are still some primitive types used for public API.  

### Tests

True, they are missing. Get me paid and I'll do them ;-) 
Seriously... look at my code and you'll agree: it's just a matter of effort. 
With dependency injection and SOLID principles in place, it's a no-brainer.  
