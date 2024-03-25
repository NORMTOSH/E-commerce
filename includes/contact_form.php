<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');


    #contact_us {
    position: relative;
    padding-top: 50px;
    padding-bottom: 50px;
    width: 100%;
    display: flex;
    flex-direction: column;
    background-image: url(https://i.postimg.cc/1XzQ2m9F/audio-headset-used-by-call-center-agents-help-clients-telecommunication-with-technology-empty-custom.jpg);
    background-size: cover;
    background-position: center;
    }

    #contact_us::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0,0,0,0.5);
    }

    .contact_container {
    z-index: 3;
    width: 100%;
    max-width: 1080px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    }

    .section-header {
    z-index: 3;
    margin-bottom: 50px;
    text-align: center;
    }

    .section-header h2 {
    color: #FFF;
    font-weight: bold;
    font-size: 3em;
    margin-bottom: 20px;
    }

    .section-header p {
    color: #FFF;
    }

    .row  {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    }

    .contact-info {
    width: 50%;
    }

    .contact-info-item {
    display: flex;
    margin-bottom: 30px;
    }

    .contact-info-icon {
    height: 70px;
    width: 70px;
    background-color: #b29969;
    text-align: center;
    border-radius: 50%;
    }

    .contact-info-icon i {
    font-size: 30px;
    line-height: 70px;
    }

    .contact-info-content {
    margin-left: 20px;
    }

    .contact-info-content h4 {
    color: #b29969;
    font-size: 1.4em;
    margin-bottom: 5px;
    }

    .contact-info-content p {
    color: #FFF;
    font-size: 1em;
    }

    .contact-form {
    background-color: #fff;
    padding: 40px;
    width: 45%;
    padding-bottom: 20px;
    padding-top: 20px;
    }

    .contact-form h2 {
    font-weight: bold;
    font-size: 2em;
    margin-bottom: 10px;
    color: #333;
    }

    .contact-form .input-box {
    position: relative;
    width: 100%;
    margin-top: 10px;
    }

    .contact-form .input-box input,
    .contact-form .input-box textarea{
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
    }

    .contact-form .input-box span {
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;
    }

    .contact-form .input-box input:focus ~ span,
    .contact-form .input-box textarea:focus ~ span{
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
    }

    .contact-form .input-box input[type="submit"]
    {
    width: 100%;
    background: #b29969;
    color: #FFF;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
    border: 1px solid #b29969;
    transition: 0.5s;
    }

    .contact-form .input-box input[type="submit"]:hover
    {
    background: #FFF;
    color: #b29969;
    }

    .map{
    padding-top: 10px;
    padding-bottom: 10px;
    width: 100%;
    }

    @media (max-width: 991px) {
    section {
        padding-top: 50px;
        padding-bottom: 50px;
    }
    
    .row {
        flex-direction: column;
    }
    
    .contact-info {
        margin-bottom: 40px;
        width: 100%;
    }
    
    .contact-form {
        width: 100%;
    }
    }
</style>

  
  <section id="contact_us">
    
    <div class="section-header">
        <div class="contact_container">
            <h2>Contact Us</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
    </div>
    
    <div class="contact_container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>Ruai Bypass<br/> Nairobi, Kenya </p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>+254-712 015 672</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>bvnaturalstone@gmail.com</p>
            </div>
          </div>
        </div>
        
        <div class="contact-form">
          <form action="" id="contact-form">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="">
              <span>Full Name</span>
            </div>
            
            <div class="input-box">
              <input type="email" required="true" name="">
              <span>Email</span>
            </div>
            
            <div class="input-box">
              <textarea required="true" name=""></textarea>
              <span>Type your Message...</span>
            </div>
            
            <div class="input-box">
              <input type="submit" value="Send" name="">
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255286.33088011944!2d36.69400909538184!3d-1.2630526314760333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f6b235704dd85%3A0x88cee0114819bf6!2sBlessed%20Ventures%20Mazeras!5e0!3m2!1sen!2ske!4v1708368572932!5m2!1sen!2ske" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>