Div Starter (part of the Div Blend) - Alpha
===================

Div Starter is a boilerplate for project specific application development. The WordPress way is to keep business logic out of the theme scope, along with that thought, custom post types, widgets, shortcodes and other non-modular, project-specific functionality is designed to be housed in the [MU-PLUGINS](http://codex.wordpress.org/Must_Use_Plugins). So in attempt encourage this WordPress practice, Div Starter was designed as a boilerplate for that purpose but with the extendablity of the Div Library readily available. Be sure to read more about this on the [Div Starter Page](http://divblend.com/div-starter).

----------


Div Blend Philosophy
---------
Developers come in all shapes, sizes, and upbringings. Too often we can identify our difference, the things that divide us from one another, but **Div Blend** *is a mission statement to blend our differences for a common good.* 

When it comes to WordPress development the goal is to understand **"the WordPress Way,"** so that our code is _not_ deprecated, vulnerable or poor simply because we abandoned the core application they we chose in the first place. The WordPress Way is the integrity of WordPress as an application platform, so when we develop on this platform we must begin with a goal to blend our difference to the platform of choice.

With that said the **Div Blend consist of 4 components** that each have a scope that maintains the WordPress ideology for development. Essentially we begin with Themes and Plugins. Themes are designed for **visual logic**, apparence, styles, markup, etc. Plugins are then responsible for **business logic**, custom post types, widgets, shortcodes, etc. Although it is easy to combine the efforts into one solution like many have attemped when creating a complete solution for a project, but as you begin to use WordPress the way it was intended you will experience freedom in your coding and maturity in your development.

## Div Blend Components ##

#### **Div Library**: ####
A toolbox of custom extendable classes for developing solutions (business logic). Consider Div Library to be a plugin framework, a parent to the Div Site Application (DSA) child as well as other custom add-on or extendable plugins that you can create yourself [(more details)](http://divblend.com/div-library/)

 - **Div Site Application (child plugin to Div Library)**:

 When you have functionality that represents the essence of what the site or project is, then you are essentially developing a project specific application. Unlike a plugin it cannot be removed or the site will cease to be. For example, custom post type solutions, project specific widgets, shortcodes, or other custom features. For that reason, **this is a [Must Use plugin](http://codex.wordpress.org/Must_Use_Plugins) which resides in the `/mu-plugins/` directory**. [(more details)](http://divblend.com/div-site-application/)

#### **Div Framework**: ####
This is the parent theme or framework component of Div Blend, it is a parent theme that includes custom actions, filters, templates and HTML markup. This is a vanilla flavored theme, container standard WordPress pages with filters to reduce customization efforts when developing the child theme. As a framework the goal is to not get in the way of the developers ability to create a theme.

 - **Div Ready (child theme to Div Framework)**:

 A boiler plate for developers to begin developing amazing websites. This child theme is loaded with SASS and emphasizes "mobile-first" theme development based on [Bones Starter theme by Themble](http://themble.com/bones/). Get ready, steady and go as you move forward with responsive design that works.

----------

**NOTE:** Each piece is a seperate component, other than the parent child relationships that are established in the documentation, the *visual logic and business logic are separate from one each other* so the can be used independently of one another. This also makes it easy for collaboration between front-end and back-end developers working together on the same project.

Instructions: How to setup Div Starter
---------
1. **Install Div Library**

	a) [Download/Clone from (github)](https://github.com/DivTruth/div-starter) to `/plugins/`

2. **Activate Plugin**
3. **Begin Development** nothing magical will appear, but at this point you can install Div Site Application for custom project-specific development, or you can develop/add other Div Library plugins to extend its core functionality
4. **For documentation** on how to develop with the Div Library, checkout [**the website**](http://divblend.com/div-library/)

Contributors
---------------

#### **Nick Worth**: *Lead Developer* ####

 - **Email** - nick@divtruth.com
 - **Twitter** - Xtremefaith

#### **Seth Carstens**: *Developer* ####

 - **Email** - seth@sethmatics.com
 - **Twitter** -  sethcarstens

#### **Cristian Munesan**: *Front-end Developer* ####

 - **Email** - cristian@bryomedia.com
 - **Twitter** -  bryomedia