<style>
    .footer {
        background-color: #f05a22;
        color: #fff;
    }

    .footer-container {
        margin: 0 auto;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .footer-column {
        flex: 1;
        min-width: 300px;
    }

    .footer-column h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
        text-transform: uppercase;

    }

    .footer-column ul {
        list-style: disc;
        margin-left: 20px;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .footer-column ul li {
        margin-bottom: 5px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer {
            flex-direction: column;
            align-items: center;
        }

        .footer-column {
            width: 100%;
            max-width: 400px;
        }

        .footer-column h3 {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .footer {
            padding: 10px;
        }

        .footer-column ul {
            font-size: 0.8rem;
        }
    }

    .social-network-title {
        display: flex;
        align-items: center;
    }

    .fanpage-facebook {
        width: 100%;
    }
    .footer-column a:hover {
        text-decoration: none !important;
    }
</style>
<div class="footer">
    <div class="footer-container container">
        @foreach($footers as $footer)
        <div class="footer-column">
            @if($footer->title)
            <h3>{{ $footer->title }}</h3>
            @endif
            <div>
                {!! $footer->description !!}
            </div>
        </div>
        @endforeach
    </div>
</div>
