@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - Become A Member')
@section('header')
      <div class="hero">
	      <h1>CPD training, support, news, <span class="amp">&</span> social events</h1>
	      <br>
	      <h2>All for a tiny annual membership</h2>
	    </div>
@endsection

@section('main')
      <div class="become-a-member">
        <section>
          <nav>
            <ul>
              <li class="active"><span>Benefits</span></li>
              <li><span>Support</span></li>
              <li><span>Our Network</span></li>
            </ul>
          </nav>

          <article title="Benefits">
            <aside>
              <img src="//picsum.photos/212/211/" alt="placeholder">
            </aside>
            <div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque adipisci similique tenetur earum fuga nam incidunt, suscipit enim dicta odio molestiae facilis eveniet, accusamus repellat reprehenderit et laudantium architecto nostrum perspiciatis eaque aperiam laboriosam. Rerum, maxime, fugiat? Accusantium tempora amet saepe nihil, repudiandae off icia maiores hic sequi similique cum itaque vitae veniam enim accusamus repellendus omnis est porro reprehenderit impedit. Porro, excepturi vitae, pariatur et fugiat perferendis odio voluptate error veritatis accusamus, ab similique. Expedita, esse, sapiente! Nesciunt fugiat, nulla!</p>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, eos.</li>
                <li>Quaerat tempore necessitatibus, quae ea repudiandae fuga molestias dolorem? Optio.</li>
                <li>Incidunt voluptate tempora, reiciendis sunt voluptatum. Amet aliquid modi, repudiandae.</li>
                <li>Ea cum eaque commodi, suscipit tempora, libero assumenda odit animi.</li>
              </ul>
            </div>
          </article>
          
          <article title="Support" hidden>
            <div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque adipisci similique tenetur earum fuga nam incidunt, suscipit enim dicta odio molestiae facilis eveniet, accusamus repellat reprehenderit et laudantium architecto nostrum perspiciatis eaque aperiam laboriosam. Rerum, maxime, fugiat? Accusantium tempora amet saepe nihil, repudiandae off icia maiores hic sequi similique cum itaque vitae veniam enim accusamus repellendus omnis est porro reprehenderit impedit. Porro, excepturi vitae, pariatur et fugiat perferendis odio voluptate error veritatis accusamus, ab similique. Expedita, esse, sapiente! Nesciunt fugiat, nulla!</p>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, eos.</li>
                <li>Quaerat tempore necessitatibus, quae ea repudiandae fuga molestias dolorem? Optio.</li>
                <li>Incidunt voluptate tempora, reiciendis sunt voluptatum. Amet aliquid modi, repudiandae.</li>
                <li>Ea cum eaque commodi, suscipit tempora, libero assumenda odit animi.</li>
              </ul>
            </div>
            <aside>
              <img src="//picsum.photos/211/211/" alt="placeholder">
            </aside>
          </article>
          
          <article title="Our Network" hidden>
            <aside>
              <img src="//picsum.photos/212/212/" alt="placeholder">
            </aside>
            <div>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, eos.</li>
                <li>Quaerat tempore necessitatibus, quae ea repudiandae fuga molestias dolorem? Optio.</li>
                <li>Incidunt voluptate tempora, reiciendis sunt voluptatum. Amet aliquid modi, repudiandae.</li>
                <li>Ea cum eaque commodi, suscipit tempora, libero assumenda odit animi.</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque adipisci similique tenetur earum fuga nam incidunt, suscipit enim dicta odio molestiae facilis eveniet, accusamus repellat reprehenderit et laudantium architecto nostrum perspiciatis eaque aperiam laboriosam. Rerum, maxime, fugiat? Accusantium tempora amet saepe nihil, repudiandae off icia maiores hic sequi similique cum itaque vitae veniam enim accusamus repellendus omnis est porro reprehenderit impedit. Porro, excepturi vitae, pariatur et fugiat perferendis odio voluptate error veritatis accusamus, ab similique. Expedita, esse, sapiente! Nesciunt fugiat, nulla!</p>
            </div>
          </article>
        </section>

        <section class="membership-subscriptions">
          <h3>Membership Subscriptions</h3>
          <div>
            <h3>Ordinary membership</h3>
            <span>£45</span>
          </div>
          <div>
            <h3>Associate membership</h3>
            <span>£20</span>
          </div>
          <div>
            <h3>Trainee membership</h3>
            <span>£10</span>
          </div>
          <div>
            <h3>Student membership</h3>
            <span>£10</span>
          </div>
          <a role="button" class="become-a-member-button">Become a member</a>
        </section>
      </div>
      
@endsection

@section('foot')
      <script src="js/become-a-member.js"></script>
      <div class="overlay"></div>
      <div class="modal-form">
        <h1>Become a member</h1>
        <p>Send us your details and we’ll get back to you with a form to sign and return in order to become an official member of the Hertfordshire Law Society.</p>
        <div class="labels">
          <label for="salutation">Salutation</label>
          <label for="other-salutation">Salutation</label>
          <label for="name">Name</label>
          <label for="email">Email address</label>
          <label for="phone_number">Phone no.</label>
          <label for="job_title">Job title</label>
          <label for="company_name">Company name</label>
          <label for="comment">Anything else?</label>
        </div>
        <form method="POST">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
          <select name="salutation" id="salutation" autofocus>
            <option value="Mr.">Mr</option>
            <option value="Mrs.">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Ms.">Ms.</option>
            <option value="Dr.">Dr.</option>
            <option value="Prof.">Prof.</option>
            <option value="Rev.">Rev.</option>
            <option value="">Other</option>
          </select>
          <input type="text" name="other-salutation" id="other-salutation" placeholder="Salutation">
          <input name="name" type="text" id="name">
          <input name="email" type="email" id="email">
          <input name="phone_number" type="tel" id="phone_number">
          <input name="job_title" type="text" id="job_title">
          <input name="company_name" type="text" id="company_name">
          <textarea name="comment" id="anything-else"></textarea>
          <input type="submit" class="submit-button" value="Submit">
        </form>
        <div></div>
      </div>
@endsection