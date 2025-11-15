# Portfolio Website

A modern, responsive portfolio website built with HTML, CSS, JavaScript, and PHP. Features attractive animations, unique icons, and a fully functional contact form.

## Features

- ✨ **Modern Design**: Clean and professional design with smooth animations
- 📱 **Responsive Layout**: Works perfectly on all devices (desktop, tablet, mobile)
- 🎨 **Unique Icons**: Font Awesome icons with custom styling
- 🎯 **Interactive Elements**: Smooth scrolling, typing animation, skill bars, project filters
- 📧 **Contact Form**: PHP-powered contact form with email functionality
- 🚀 **Performance**: Optimized for fast loading and smooth animations
- 🌟 **Animations**: CSS animations and JavaScript interactions

## Sections

1. **Hero Section**: Eye-catching introduction with typing animation
2. **About Section**: Personal information and statistics
3. **Skills Section**: Animated skill bars with percentages
4. **Projects Section**: Filterable project showcase
5. **Contact Section**: Working contact form with PHP backend

## Technologies Used

- **HTML5**: Semantic markup
- **CSS3**: Modern styling with animations and responsive design
- **JavaScript**: Interactive features and form handling
- **PHP**: Contact form backend
- **Font Awesome**: Icon library

## Setup Instructions

1. **Clone or Download** the project files

2. **Configure PHP**:
   - Make sure you have PHP installed and running
   - Update the email address in `contact.php` (line 42):
     ```php
     $to = 'your-email@example.com'; // Change this to your email
     ```

3. **Setup Web Server**:
   - For local development, use XAMPP, WAMP, or PHP's built-in server:
     ```bash
     php -S localhost:8000
     ```
   - Or use any web server that supports PHP

4. **Permissions**:
   - Ensure the `contacts/` directory is writable (will be created automatically)

## Customization

### Personal Information
Edit the following in `index.html`:
- Name, title, and description in the Hero section
- About section details (birthday, phone, email, location)
- Social media links
- Project information
- Skills and percentages

### Colors
Modify CSS variables in `style.css`:
```css
:root {
    --primary-color: #4a90e2;
    --secondary-color: #50c878;
    --accent-color: #ff6b6b;
    /* ... */
}
```

### Typing Animation
Edit the phrases array in `script.js`:
```javascript
const phrases = ['Web Developer', 'UI/UX Designer', 'Full Stack Developer', 'Creative Coder'];
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## File Structure

```
portfolio/
├── index.html          # Main HTML file
├── style.css           # Stylesheet
├── script.js           # JavaScript functionality
├── contact.php         # PHP contact form handler
├── contacts/           # Contact form submissions (auto-created)
└── README.md           # This file
```

## Contact Form

The contact form includes:
- Client-side validation
- Server-side validation
- Email sending functionality
- Backup file storage in `contacts/` directory

## Notes

- Replace placeholder images with your actual project images
- Update social media links with your profiles
- Customize content to match your personal information
- Test the contact form in a PHP-enabled environment

## License

This project is open source and available for personal and commercial use.

## Support

For issues or questions, please check the code comments or modify as needed for your requirements.

