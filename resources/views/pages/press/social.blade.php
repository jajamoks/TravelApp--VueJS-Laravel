<div class="social-sharing post-sharing">
    <h6>Share This Press</h6>
    <ul class="text-center">
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(secure_url('/press/' . $press->slug ))}}">
                <i class="fa fa-facebook-square"></i>
            </a>
        </li>
        <li>
            <a href="https://pinterest.com/pin/create/button/?url={{urlencode(secure_url('/press/' . $press->slug ))}}&media={{urlencode($press->featured_image)}}&description={{urlencode($press->title)}}">
                <i class="fa fa-pinterest-square"></i>
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{urlencode(secure_url('/press/' . $press->slug ))}}&title={{urlencode($press->title)}}&summary={{urlencode($press->summary)}}">
                <i class="fa fa-linkedin-square"></i>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/home?status={{urlencode(secure_url('/press/' . $press->slug ))}}">
                <i class="fa fa-twitter-square"></i>
            </a>
        </li>
    </ul>
</div>
