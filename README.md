<p align="center">
  <a href="https://tailwindcss.com" target="_blank">
    <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/75739874/210090629-6116d0c8-b268-4121-a142-fe59239bf7d5.svg">
      <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/75739874/210090704-4c1f4254-48a3-4d0d-bcb8-936ca35d1082.svg">
      <img alt="Tailwind CSS" src="https://user-images.githubusercontent.com/75739874/210015003-1e8611fb-fbbf-4a23-882d-bec14825ee09.svg" width="336" height="112" style="max-width: 100%;">
    </picture>
  </a>
</p>

<p align="center">A WordPress Theme Utilizing Tailwind CSS</p>

------

- [Getting Started](#getting-started)
- [More about Tailwind CSS](#more-about-tailwind)

------

*TailKick* offers WordPress site owners a fresh look and theme builders an alternative developer experience.

WordPress users can switch their websites to the *TailKick* theme and make customizations in the [usual way](#gs-site-owners).

For folks interested in working with *TailKick*'s codebase — those who may create a new theme based on *TailKick* or others interested in [contributing to this project](#contributing) :smile: — I recommend the Tailwind CSS framework and its challenge of traditional CSS 'best practices.'

#### The traditional approach: write custom CSS for a custom design

```html
<a class="btn-variant-37" href="#" type="button">Download</a>

<style>
  .btn-variant-37 {
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

Read [more about Tailwind](#more-about-tailwind)

## <a name="getting-started"></a> Getting Started 

#### <a name="gs-site-owners"></a>Install TailKick in WordPress

- Download the `tailkick` folder in this repository. (Here's a DownGit link: [tailkick](https://downgit.github.io/#/home?url=https://github.com/ge3224/tailkick/tree/main/tailkick).) 
- Upload the `tailkick.zip` file through your WordPress dashboard. (See [WP help docs](https://wordpress.org/support/article/appearance-themes-screen/#using-the-upload-method).)
- Click the **Activate** link.

#### <a name="gs-theme-developers"></a>Develop TailKick with Tailwind CSS

```bash
git clone https://github.com/ge3224/tailkick
cd tailkick
npm install
npm run start:css
```

## <a name="more-about-tailwind"></a>More About Tailwind CSS

Tailwind CSS describes itself as a "utility-first CSS framework." It is an extensive collection of class selectors mapped to carefully constrained rulesets — "primitive utilities." You style HTML elements by adding and removing Tailwind classes in your markup. Tailwind users often say it increases their productivity and is easier to manage as their projects grow in complexity.

The Tailwind framework is a descendant of Atomic CSS, which achieved notarity with Thierry Koblentz's 2013 essay [*Challenging CSS Best Practices*](https://www.smashingmagazine.com/2013/10/challenging-css-best-practices-atomic-approach/). In his article, Koblentz introduces the concept of breaking down styles into irreducible units to make them more reusable.

Fans love Tailwind because it addresses well-known pain points associated with CSS development:

- No more need to come up with silly class names for new styles
- An end to sprawling additions in the CSS as a website grows with new features and designs
- Dead code is eliminated; refactoring feels safer

Read more about [Tailwind's philosophy](https://tailwindcss.com/docs/utility-first) on its website. See also [The evolution of scalable CSS](https://frontendmastery.com/posts/the-evolution-of-scalable-css/).

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
- [ ] Test legacy widgets
- [ ] Address post formats
- [ ] Accommodate block theme development
- [ ] Handle pagination
- [ ] Handle localization
- [ ] Handle accessibility
