const about = document.querySelector('#about');
const works = document.querySelector('.works-service-title');
const contact = document.querySelector('.contact-title');

const worksLi1 = document.querySelector('.works-list-1');
const worksLi2 = document.querySelector('.works-list-2');
const worksLi3 = document.querySelector('.works-list-3');
const worksLi4 = document.querySelector('.works-list-4');
const worksLi5 = document.querySelector('.works-list-5');
const worksLi6 = document.querySelector('.works-list-6');

const cb = function(entrise, observer) {
  entrise.forEach(entry => {
    if(entry.isIntersecting) {
      entry.target.classList.add('fade-in');
      observer.unobserve(entry.target);
    }
  });
}

const cb2 = function(entrise, observer) {
  entrise.forEach(entry => {
    if(entry.isIntersecting) {
      entry.target.classList.add('fade-in-line');
      observer.unobserve(entry.target);
    }
  });
}
const io = new IntersectionObserver(cb);
io.observe(about);
io.observe(works);
io.observe(contact);

const inter = new IntersectionObserver(cb2);
inter.observe(worksLi1);
inter.observe(worksLi2);
inter.observe(worksLi3);
inter.observe(worksLi4);
inter.observe(worksLi5);
inter.observe(worksLi6);
