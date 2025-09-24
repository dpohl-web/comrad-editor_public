<div className="grid-x grid-padding-x result__wrapper result__wrapper--literature">
                            <div className="cell small-24">
                                <h3 style={{ color: primaryColor }}>
                                    {
                                        translationObject[
                                            findUiLanguage(
                                                translationObject,
                                                language
                                            )
                                        ].literature
                                    }
                                </h3>
                                {literature.map(oneLiteratureRow => (
                                    <p>{oneLiteratureRow}</p>
                                ))}
                            </div>
                            <div className="applicationbody__block-border applicationbody__block-border--bottom-left" />
                            <div className="applicationbody__block-border applicationbody__block-border--bottom-right" />
                        </div>