<p align="center">
  <a href="https://jacobbenison.com/" target="_blank">
    <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/75739874/210090629-6116d0c8-b268-4121-a142-fe59239bf7d5.svg">
      <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/75739874/210090704-4c1f4254-48a3-4d0d-bcb8-936ca35d1082.svg">
      <img alt="Tailwind CSS" src="https://user-images.githubusercontent.com/75739874/210015003-1e8611fb-fbbf-4a23-882d-bec14825ee09.svg" width="336" height="112" style="max-width: 100%;">
    </picture>
  </a>
</p>

<p align="center">A WordPress Theme Utilizing Tailwind CSS</p>

<div align="center">
  
![TailKick Views](https://komarev.com/ghpvc/?username=ge3224&label=Views&color=blue&style=flat)
[![TailKick License](https://img.shields.io/github/license/ge3224/tailkick)](https://github.com/ge3224/tailkick/blob/main/LICENSE.md)
  
</div>

*TailKick* offers WordPress site owners a fresh look and theme builders a surprisingly pleasant developer experience.

WordPress users can switch their websites to the *TailKick* theme and make customizations in the [usual way](#gs-site-owners).

For folks interested in working with *TailKick*'s codebase, those who may create a new theme based on *TailKick* or those interested in [contributing to this project](#contributing) :smile:, I recommend the [Tailwind CSS](#more-about-tailwind) framework and its challenge of traditional CSS best practices.

#### The traditional approach: write custom CSS for a custom design

```html
<a class="nav__btn--teal-3" href="#" type="button">Download</a>

<style>
  .nav__btn--teal-3 {
    margin-top: 0.75rem;
    padding: 0.5rem 1rem;
    font-weight: 700;
    background-color: rgb(94,234,212);
    border: 1px solid rgb(0,0,0);
    box-shadow: 5px 5px 0 0 rgba(0,0,0,0.20);
  }
</style>
```

#### The Tailwind approach: create a custom design without writing additional CSS

```html
<a class="mt-3 px-4 py-2 font-bold bg-teal-300 border border-black shadow-[5px_5px_0_0_rgba(0,0,0,0.20)]" href="#" type="button">Download</a>

<!-- No new CSS needs to be written -->
```

[More about Tailwind](#more-about-tailwind)

## <a name="getting-started"></a> Getting Started 

#### <a name="gs-site-owners"></a>Install TailKick in WordPress

- Download the `tailkick` folder in this repository. (Here's a DownGit link: [tailkick](https://downgit.github.io/#/home?url=https://github.com/ge3224/tailkick/tree/main/tailkick).) 
- Upload the `tailkick.zip` file through your WordPress dashboard. (See [WP help docs](https://wordpress.org/support/article/appearance-themes-screen/#using-the-upload-method).)
- Click the **Activate** link.

Without editing template files, CSS, or PHP, you can personalize *TailKick*'s look using your unique content and WordPress's Customize API (Customizer).

#### <a name="gs-theme-developers"></a>Develop a Theme Based on TailKick with Tailwind CSS

```bash
git clone https://github.com/ge3224/tailkick
cd tailkick
npm install
npm run start:css
```

## <a name="more-about-tailwind"></a>More About Tailwind CSS

Tailwind CSS describes itself as a &ldquo;utility-first CSS framework.&rdquo; It is an extensive library of class selectors mapped to carefully constrained rulesets called &ldquo;primitive utilities.&rdquo; You style HTML elements by adding and removing Tailwind classes in your markup. Tailwind users often say it increases their productivity and is easier to manage as their projects grow in complexity. The framework addresses well-known pain points associated with CSS development:

- No more need to come up with silly class names for new styles (e.g. `card-4__subttl--lightorange-3`)
- An end to sprawling additions in the CSS as a website grows with new features and designs
- Dead code is eliminated; refactoring feels safer

The Tailwind framework is a descendant of Atomic CSS, which achieved notarity with Thierry Koblentz's 2013 essay [*Challenging CSS Best Practices*](https://www.smashingmagazine.com/2013/10/challenging-css-best-practices-atomic-approach/).
Read more about [Tailwind's philosophy](https://tailwindcss.com/docs/utility-first) on its website. (See also [The Evolution of Scalable CSS](https://frontendmastery.com/posts/the-evolution-of-scalable-css/).)

## <a name="contributing"></a>Contributing to TailKick

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request

## <a name="references"></a>References

- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Tailwindcss Utility-first Fundamentals](https://tailwindcss.com/docs/utility-first)
- [The Evolution of Scalable CSS](https://frontendmastery.com/posts/the-evolution-of-scalable-css/)

## TODO

- [x] Add a favicon 
- [x] Use PostCSS minifier
- [ ] Rebuild theme from WordPress's Twenty_Seventeen
    - [x] Single Comments
    - [ ] Single Tags
    - [ ] Single Categories
    - [ ] Single Prev/Next links
    - [ ] Social Icons
    - [ ] Handle post formats
        - [x] Aside post format
        - [ ] Featured image for gallery post format
- [ ] Accommodate block theme development
    - [ ] Block Widget CSS Defaults
- [ ] Test legacy widgets
- [ ] Check accessibility
